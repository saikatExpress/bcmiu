<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Login;
use Illuminate\Http\Request;
use App\Services\ValidationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return Login::create();
    }

    public function store(Request $request)
    {
        ValidationService::loginUserData($request->all());

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if($user){
            $status = $user->status;
            $block = $user->block;

            if($status !== 'active'){
                return response()->json(['success' => false, 'message' => 'This account is currently deactive.']);
            }

            if($block === 1){
                return response()->json(['success' => false, 'message' => 'This account is currently blocked.']);
            }

            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)){
                $authUser = Auth::user();
                $request->session()->regenerate();
                $request->session()->put('user_id', $authUser->id);

                if($authUser->role === 'admin'){
                    return response()->json(['success' => true, 'message' => 'Authentication Successfull.Please wait...', 'role' => $authUser->role]);
                }elseif($authUser->role === 'user'){
                    $user->update(['otp' => null, 'user_agent' => $request->header('User-Agent'),'login_at' => Carbon::now()]);
                    return response()->json(['success' => true, 'message' => 'Authentication Successfull.Please wait...', 'role' => $authUser->role]);
                }
            }
            return response()->json(['success' => false, 'message' => 'Email or password doesn"t match.Please try with correct crediantials.']);
        }

        return response()->json(['success' => false, 'message' => 'This account not found.Please try with correct crediantials.']);
    }
}