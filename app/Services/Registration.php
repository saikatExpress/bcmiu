<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Registration
{
    public static function create()
    {
        return view('auth.registration');
    }

    public static function store($name,$email,$mobile,$password)
    {
        try {
            DB::beginTransaction();

            $userObj = new User();

            $userObj->name         = Str::title($name);
            $userObj->email        = $email;
            $userObj->mobile       = $mobile;
            $userObj->whatsapp     = $mobile;
            $userObj->role         = 'user';
            $userObj->password     = Hash::make($password);
            $userObj->joining_at   = Carbon::now();
            $userObj->created_at   = Carbon::now();
            $userObj->status       = 'active';

            $res = $userObj->save();

            DB::commit();
            if($res){
                return true;
            }
            return false;
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }
}