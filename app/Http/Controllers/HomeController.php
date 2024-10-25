<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        $about = About::first();
        $setting = Setting::first();
        
        return view('website.about.about', compact('about', 'setting'));
    }

    public function term()
    {
        $data['info'] = [
            'page' => 'Terms & Condition',
        ];

        $data['setting'] = Setting::first();
        return view('website.terms')->with($data);
    }

    public function privacypolicy()
    {
        $data['info'] = [
            'page' => 'Privacy & Policy',
        ];

        $data['setting'] = Setting::first();
        return view('website.privacy')->with($data);
    }

    public function support()
    {
        $data['info'] = [
            'page' => 'Support',
        ];

        $data['setting'] = Setting::first();
        return view('website.support')->with($data);
    }

    public function disclaimer()
    {
        $data['info'] = [
            'page' => 'Disclaimer',
        ];

        $data['setting'] = Setting::first();
        return view('website.disclaimer')->with($data);
    }

    public function help()
    {
        $data['info'] = [
            'page' => 'Help',
        ];

        $data['setting'] = Setting::first();
        return view('website.help')->with($data);
    }
}