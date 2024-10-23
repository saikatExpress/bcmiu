<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function index()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        $banners = Banner::where('status', '1')->latest()->get();

        return view('admin.website.bannerindex', compact('banners'))->render();
    }

    public function create()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        return view('admin.website.banner');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'banner_image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'           => 'required|string|max:250',
                'title'          => 'required|string|max:500',
                'description'    => 'required|string|max:2000',
                'facebook_link'  => 'nullable|url',
                'twitter_link'   => 'nullable|url',
                'instagram_link' => 'nullable|url',
                'linkedin_link'  => 'nullable|url',
            ]);

            $banner = new Banner();

            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('bannerimages'), $filename);
                $banner->banner_image = $filename;
            }


            $banner->name           = Str::title($request->name);
            $banner->title          = Str::title($request->title);
            $banner->description    = $request->description;
            $banner->facebook_link  = $request->facebook_link;
            $banner->twitter_link   = $request->twitter_link;
            $banner->instagram_link = $request->instagram_link;
            $banner->linkedin_link  = $request->linkedin_link;
            $banner->created_by     = auth()->user()->id;
            $res = $banner->save();

            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Banner added successfully!');
            }

        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function show($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json(['message' => 'Banner not found.'], 404);
        }

        return response()->json($banner);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'banner_image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'           => 'required|string|max:250',
                'title'          => 'required|string|max:500',
                'description'    => 'required|string|max:2000',
                'facebook_link'  => 'nullable|url',
                'twitter_link'   => 'nullable|url',
                'instagram_link' => 'nullable|url',
                'linkedin_link'  => 'nullable|url',
            ]);

            $id = $request->input('id');

            $banner = Banner::find($id);

            if($banner){
                if ($request->hasFile('banner_image')) {
                    $filename = $banner->banner_image;
                    if (file_exists(public_path('bannerimages/' . $filename))) {
                        unlink(public_path('bannerimages/' . $filename));
                    }
                    $file     = $request->file('banner_image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('bannerimages'), $filename);
                    $banner->banner_image = $filename;
                }

                $banner->name           = Str::title($request->name);
                $banner->title          = Str::title($request->title);
                $banner->description    = $request->description;
                $banner->facebook_link  = $request->facebook_link;
                $banner->twitter_link   = $request->twitter_link;
                $banner->instagram_link = $request->instagram_link;
                $banner->linkedin_link  = $request->linkedin_link;
                $banner->created_by     = auth()->user()->id;

                $res = $banner->save();

                DB::commit();
                if($res){
                    return redirect()->back()->with('message', 'Banner updated successfully!');
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $banner = Banner::where('id', $id)->first();

            if (!$banner) {
                return response()->json(['message' => 'Banner not found.'], 404);
            }

            $filename = $banner->banner_image;

            if ($filename) {
                Storage::disk('public')->delete('bannerimages/' . $filename);

                File::delete(public_path('bannerimages/' . $filename));
            }

            $res = $banner->delete();

            DB::commit();
            if($res){
                return response()->json(['message' => 'Banner deleted successfully.']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }
}