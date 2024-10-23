<?php

namespace App\Services;

use App\Models\Division;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Registration
{
    public static function create()
    {
        $divisions = Division::all();

        return view('auth.registration', compact('divisions'));
    }

    public static function store($name,$email,$mobile,$division,$district,$upazila,$password)
    {
        try {
            DB::beginTransaction();

            $userObj = new User();

            $userObj->name        = Str::title($name);
            $userObj->email       = $email;
            $userObj->mobile      = $mobile;
            $userObj->whatsapp    = $mobile;
            $userObj->division_id = $division;
            $userObj->district_id = $district;
            $userObj->upazila_id  = $upazila;
            $userObj->role        = 'user';
            $userObj->password    = Hash::make($password);
            $userObj->joining_at  = Carbon::now();
            $userObj->created_at  = Carbon::now();
            $userObj->status      = 'active';

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