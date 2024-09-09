<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ValidationService
{
    public static function validateUserData($data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'min:2', 'max:250'],
            'email'        => ['required', 'email', 'unique:users,email'],
            'mobile'       => ['required', 'unique:users,mobile'],
            'password'     => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);
    }

    public static function loginUserData($data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'email', 'max:250'],
            'password' => ['required']
        ]);
    }
}