<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function index()
    {
        $logins = User::whereDate('login_at', Carbon::today())->where('role', 'user')->get();

        return view('admin.home.index', compact('logins'));
    }
}