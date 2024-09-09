<?php

namespace App\Services;

use App\Models\FAQ;
use App\Models\About;
use App\Models\Banner;
use App\Models\Service;

class Auth
{
    public static function welcome()
    {
        $data['faqs']     = FAQ::all();
        $data['about']    = About::first();
        $data['banners']  = Banner::where('status', '1')->get();
        $data['services'] = Service::where('status', 'active')->get();

        return view('welcome')->with($data);
    }
}