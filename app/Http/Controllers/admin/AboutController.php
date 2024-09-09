<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function create()
    {
        $about = About::first();

        return view('admin.website.about', compact('about'))->render();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'main_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'right_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'left_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'top_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title'        => 'nullable|string|max:500',
            'description'  => 'nullable|string|max:500',
            'status'       => 'nullable|string|in:active,inactive',
        ]);

        // Check if About record exists
        $about = About::first() ?: new About();

        if ($request->hasFile('main_image')) {
            $filename = $about->main_image;

            if ($filename) {
                Storage::disk('public')->delete('aboutimages/main/' . $filename);

                File::delete(public_path('aboutimages/main/' . $filename));
            }

            $file     = $request->file('main_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('aboutimages/main', $filename, 'public');
            $about->main_image = $filename;
        }

        if ($request->hasFile('right_image')) {
            $filename = $about->right_image;

            if ($filename) {
                Storage::disk('public')->delete('aboutimages/right/' . $filename);

                File::delete(public_path('aboutimages/right/' . $filename));
            }

            $file     = $request->file('right_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('aboutimages/right', $filename, 'public');
            $about->right_image = $filename;
        }

        if ($request->hasFile('left_image')) {
            $filename = $about->left_image;

            if ($filename) {
                Storage::disk('public')->delete('aboutimages/left/' . $filename);

                File::delete(public_path('aboutimages/left/' . $filename));
            }

            $file     = $request->file('left_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('aboutimages/left', $filename, 'public');
            $about->left_image = $filename;
        }
        if ($request->hasFile('top_image')) {
            $filename = $about->top_image;

            if ($filename) {
                Storage::disk('public')->delete('aboutimages/top/' . $filename);

                File::delete(public_path('aboutimages/top/' . $filename));
            }

            $file     = $request->file('top_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('aboutimages/top', $filename, 'public');
            $about->top_image = $filename;
        }

        $about->title       = $request->title;
        $about->description = $request->description;
        $about->status      = $request->status;
        $about->save();

        return redirect()->back()->with('message', 'About information saved successfully!');
    }
}