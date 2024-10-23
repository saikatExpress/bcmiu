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
            if (file_exists(public_path('aboutimages/main/' . $about->main_image))) {
                unlink(public_path('aboutimages/main/' . $about->main_image));
            }

            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();

            $mainImage->move(public_path('aboutimages/main'), $mainImageName);

            $about->main_image = $mainImageName;
        }

        if ($request->hasFile('right_image')) {
            if (file_exists(public_path('aboutimages/right/' . $about->right_image))) {
                unlink(public_path('aboutimages/right/' . $about->right_image));
            }

            $rightImage = $request->file('right_image');
            $rightImageName = time() . '_right.' . $rightImage->getClientOriginalExtension();
            $rightImage->move(public_path('aboutimages/right'), $rightImageName);
            $about->right_image = $rightImageName;
        }

        if ($request->hasFile('left_image')) {
            if (file_exists(public_path('aboutimages/left/' . $about->left_image))) {
                unlink(public_path('aboutimages/left/' . $about->left_image));
            }

            $leftImage = $request->file('left_image');
            $leftImageName = time() . '_left.' . $leftImage->getClientOriginalExtension();
            $leftImage->move(public_path('aboutimages/left'), $leftImageName);
            $about->left_image = $leftImageName;
        }

        if ($request->hasFile('top_image')) {
            if (file_exists(public_path('aboutimages/top/' . $about->top_image))) {
                unlink(public_path('aboutimages/top/' . $about->top_image));
            }

            $topImage = $request->file('top_image');
            $topImageName = time() . '_top.' . $topImage->getClientOriginalExtension();
            $topImage->move(public_path('aboutimages/top'), $topImageName);
            $about->top_image = $topImageName;
        }
        $about->title       = $request->title;
        $about->description = $request->description;
        $about->status      = $request->status;
        $about->save();

        return redirect()->back()->with('message', 'About information saved successfully!');
    }
}