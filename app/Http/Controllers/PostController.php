<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
                $request->media->storeAs('uploads', $filename);
                $post->media = $filename;
            }

            if ($request->division_id) {
                $post->division_id = $request->division_id;
            }

            $post->created_by = Auth::id();

            $res = $post->save();
            DB::commit();
            if($res){
                return response()->json(['success' => true, 'message' => 'Post submitted successfully!']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }
}