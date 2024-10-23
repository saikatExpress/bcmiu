<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
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
        $division = $request->input('division');
        $district = $request->input('district');
        $upazila  = $request->input('upazila');
        $password = $request->input('password');

        $res = Registration::store($name,$email,$mobile,$division,$district,$upazila,$password);

        if($res === true){
            return response()->json(['success' => true, 'message' => 'Registration successfully confirmed ' . $name]);
        }
        return response()->json(['success' => false, 'message' => 'Registration failed: Your account not opened at this moment..! ' . $name]);
    }

    public function getDistrict($id)
    {
        $districts = District::where('division_id',$id)->get();
        if($districts){
            return response()->json(['districts' => $districts]);
        }
    }

    public function getUpazila($id)
    {
        $upazilas = Upazila::where('district_id',$id)->get();
        if($upazilas){
            return response()->json(['upazilas' => $upazilas]);
        }
    }
}