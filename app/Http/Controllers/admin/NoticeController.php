<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function create()
    {
        return view('admin.notice.index');
    }

    public function store(Request $request)
    {

    }
}