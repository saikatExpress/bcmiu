<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
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
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalBranches = Branch::where('status', 'active')->count();
        $totalNotice = Notice::count();
        return view('admin.home.index', compact('logins', 'totalUsers', 'totalAdmins', 'totalBranches', 'totalNotice'));
    }
}