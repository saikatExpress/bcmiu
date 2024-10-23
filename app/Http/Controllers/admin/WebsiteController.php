<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function create()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        return view('admin.website.create');
    }

    public function projectCreate()
    {
        $setting = Setting::first();

        return view('admin.setting.info', compact('setting'))->render();
    }

    public function update(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_email' => 'required|email|max:255',
            'project_mobile' => 'required|string|max:15',
            'project_address' => 'required|string',
            'project_link' => 'required|url',
            'project_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::firstOrNew();

        $setting->project_name    = $request->project_name;
        $setting->project_email   = $request->project_email;
        $setting->project_mobile  = $request->project_mobile;
        $setting->project_mobile1 = $request->project_mobile1;
        $setting->project_address = $request->project_address;
        $setting->project_link    = $request->project_link;

        if ($request->hasFile('project_logo')) {
            if ($setting->project_logo && file_exists(public_path('projectimages/' . $setting->project_logo))) {
                unlink(public_path('projectimages/' . $setting->project_logo));
            }

            $logoName = time() . '_' . $request->file('project_logo')->getClientOriginalName();
            $request->file('project_logo')->move(public_path('projectimages'), $logoName);
            $setting->project_logo = $logoName;
        }

        if ($request->hasFile('background_image')) {
            if ($setting->background_image && file_exists(public_path('projectimages/' . $setting->background_image))) {
                unlink(public_path('projectimages/' . $setting->background_image));
            }

            $bgName = time() . '_' . $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->move(public_path('projectimages'), $bgName);
            $setting->background_image = $bgName;
        }

        $setting->facebook_link  = $request->facebook_link;
        $setting->twitter_link   = $request->twitter_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->linkedin_link  = $request->linkedin_link;
        $setting->youtube_link   = $request->youtube_link;

        $setting->save();

        return response()->json(['success' => true, 'message' => 'Project settings updated successfully.']);
    }

}