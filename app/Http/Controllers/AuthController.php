<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth as ServicesAuth;

class AuthController extends Controller
{
    public function home()
    {
        Auth::logout();
        return ServicesAuth::welcome();
    }

    public function logout(Request $request)
    {
        $id = Auth::id();

        $user = User::find($id);

        if ($user) {
            $user->logout_at = now();
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}