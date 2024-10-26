<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function create()
    {
        $data['posts'] = Post::with('comments')->where('created_by', Auth::id())->get();
        return view('user.profile.create')->with($data);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name'     => ['required'],
                'email'    => ['required','email','unique:users,email,' . auth()->user()->id],
                'mobile'   => ['required','unique:users,mobile,' . auth()->user()->id],
                'whatsapp' => ['required','unique:users,whatsapp,' . auth()->user()->id],
                'bio'      => ['nullable']
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = User::find(auth()->user()->id);
            if($user){
                $user->name     = Str::title($request->name);
                $user->email    = $request->email;
                $user->mobile   = $request->mobile;
                $user->whatsapp = $request->whatsapp;
                $user->address  = $request->bio;

                $res = $user->save();

                DB::commit();
                if($res){
                    return response()->json(['success' => true, 'message' => 'Update information successfully']);
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function passUpdate(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'current_password' => ['required'],
                'password' => [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                ],
                'confirm_password' => ['required']
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = User::find(auth()->user()->id);
            
            if ($user && Hash::check($request->input('password'), $user->password)) {
                $user->password     = Hash::make($request->input('password'));
                $res = $user->save();

                DB::commit();
                if($res){
                    return response()->json(['success' => true, 'message' => 'Password update successfully']);
                }
            }else{
                return response()->json(['success' => false, 'message' => 'Your current password doesn"t marched.']);
            }
            
            if($user){
                
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function locationUpdate(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'division' => ['required', 'exists:divisions,id'],
                'district' => ['required', 'exists:districts,id'],
                'upazila' => ['required', 'exists:upazilas,id'],
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = User::find(auth()->user()->id);
            
            if ($user) {
                $user->division_id = $request->division;
                $user->district_id = $request->district;
                $user->upazila_id  = $request->upazila;
                
                $res = $user->save();

                DB::commit();
                if($res){
                    return response()->json(['success' => true, 'message' => 'Location update successfully']);
                }
            }else{
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }
            
            if($user){
                
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function about()
    {
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', auth()->user()->division_id)->get();
        $data['upazilas'] = Upazila::where('district_id', auth()->user()->district_id)->get();
        
        return view('user.profile.about')->with($data);
    }

    public function post()
    {
        $data['posts'] = Post::with('comments')->where('created_by', Auth::id())->get();
        
        return view('user.profile.posts')->with($data);
    }
}