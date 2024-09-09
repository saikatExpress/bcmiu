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
}