<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Notice;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'content'     => 'required',
                'media'       => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:2048',
                'division_id' => 'required|exists:divisions,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $post = new Post();
            $post->content = $request->content;

            if ($request->hasFile('media')) {
                $filename = time() . '.' . $request->media->getClientOriginalExtension();
                
                $request->media->move(public_path('uploads'), $filename);
                
                $post->media = $filename;
            }


            if ($request->division_id) {
                $post->division_id = $request->division_id;
            }

            $post->created_by = Auth::id();

            $res = $post->save();
            DB::commit();
            if($res){
                return response()->json([
                    'success' => true, 
                    'message' => 'Post submitted successfully!',
                    'post' => [
                        'content' => $post->content,
                        'media' => $post->media ? asset('uploads/' . $post->media) : null,
                        'created_at' => $post->created_at->diffForHumans(),
                        'user' => [
                            'name' => Auth::user()->name,
                            'profile_picture' => Auth::user()->profile_picture ? asset('uploads/' . Auth::user()->profile_picture) : asset('assets/img/demo.jpg')
                        ]
                    ]
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function fetchPosts()
    {
        $notices = Notice::with(['comments', 'author'])->latest()->take(10)->get();
        
        $posts = Post::with(['author', 'comments'])->latest()->take(10)->get();
        
        $data = [
            'notices' => $notices->map(function ($notice) {
                return [
                    'id'         => $notice->id,
                    'image'      => $notice->notice_image,
                    'title'      => $notice->title,
                    'tableName'  => 'notices',
                    'content'    => $notice->content,
                    'type'       => $notice->type,
                    'email'      => $notice->contact_email,
                    'phone'      => $notice->contact_phone,
                    'privacy'    => $notice->privacy_type,
                    'created_at' => $notice->created_at->diffForHumans(),
                    'user'       => [
                        'name'            => $notice->author->name,
                        'profile_picture' => asset('assets/img/demo.jpg')
                    ],
                    'comments' => $notice->comments->map(function ($comment) {
                        return [
                            'id'      => $comment->id,
                            'comment' => $comment->comment,
                            'user'    => [
                                'name'            => getName($comment->user_id),
                                'profile_picture' => asset('assets/img/demo.jpg')
                            ],
                            'created_at' => $comment->created_at->diffForHumans(),
                        ];
                    }),
                ];
            }),
            'posts' => $posts->map(function ($post) {
                return [
                    'id'         => $post->id,
                    'image'      => $post->media,
                    'title'      => null,
                    'tableName'  => 'posts',
                    'type'       => null,
                    'content'    => $post->content,
                    'email'      => null,
                    'phone'      => null,
                    'privacy'    => null,
                    'created_at' => $post->created_at->diffForHumans(),
                    'user'       => [
                        'name'            => $post->author->name,
                        'profile_picture' => asset('assets/img/demo.jpg')
                    ],
                    'comments' => $post->comments->map(function ($comment) {
                        return [
                            'id'      => $comment->id,
                            'comment' => $comment->comment,
                            'user'    => [
                                'name'            => 'Saikat',
                                'profile_picture' => asset('assets/img/demo.jpg')
                            ],
                            'created_at' => $comment->created_at->diffForHumans(),
                        ];
                    }),
                ];
            })
        ];
        
        $combined = collect($data['notices'])->merge(collect($data['posts']));

        $sorted = $combined->sortByDesc('created_at');
        
        $finalData = $sorted->take(10)->map(function ($item) {
            return [
                'id'         => $item['id'],
                'image'      => $item['image'],
                'tableName'  => $item['tableName'],
                'title'      => $item['title'],
                'content'    => $item['content'],
                'type'       => $item['type'],
                'email'      => $item['email'],
                'phone'      => $item['phone'],
                'privacy'    => $item['privacy'],
                'created_at' => $item['created_at'],
                'user'       => $item['user'],
                'comments'   => $item['comments'],
            ];
        });
        
        return response()->json($finalData);
    }


    public function commentStore(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required|integer',
            'table' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->category = $request->table;
        $comment->save();

        return response()->json([
            'comment' => [
                'id' => $comment->id,
                'text' => $comment->comment,
                'created_at' => $comment->created_at->diffForHumans(),
                'user' => [
                    'name' => auth()->user()->name,
                    'profile_picture' => asset('assets/img/demo.jpg'),
                ]
            ]
        ]);
    }

}