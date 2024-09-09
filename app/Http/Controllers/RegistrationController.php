<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Registration;
use App\Services\ValidationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function create()
    {
        return Registration::create();
    }

    public function store(Request $request)
    {
        $validator = ValidationService::validateUserData($request->all());


        $name     = $request->input('name');
        $email    = $request->input('email');
        $mobile   = $request->input('mobile');
        $password = $request->input('password');

        $res = Registration::store($name,$email,$mobile,$password);

        if($res === true){
            return response()->json(['success' => true, 'message' => 'Registration successfully confirmed ' . $name]);
        }
        return response()->json(['success' => false, 'message' => 'Registration failed: Your account not opened at this moment..! ' . $name]);
    }
}