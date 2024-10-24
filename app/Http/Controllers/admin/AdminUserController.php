<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('role', 'user')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('whatsapp', 'like', '%' . $search . '%')
                    ->orWhere('id', $search);
            })
            ->latest()
            ->paginate(10);

        $branches = Branch::where('status', 'active')->get();
        if ($request->ajax()) {
            return view('admin.user.partials.user-table', compact('users', 'branches'))->render();
        }

        return view('admin.user.index', compact('users', 'branches'));
    }

    public function create()
    {
        $data['divisions'] = Division::all();
        $data['branches'] = Branch::where('status', 'active')->get();

        return view('admin.user.create')->with($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'branch'   => ['required'],
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users',
                'mobile'   => 'nullable|string|max:15|unique:users',
                'whatsapp' => 'nullable|string|max:15',
                'division' => 'nullable',
                'district' => 'nullable',
                'upazila'  => 'nullable',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'branch_id'   => $validated['branch'],
                'name'        => $validated['name'],
                'email'       => $validated['email'],
                'mobile'      => $validated['mobile'],
                'whatsapp'    => $validated['whatsapp'] ?? $validated['mobile'],
                'division_id' => $request->input('division'),
                'district_id' => $request->input('district'),
                'upazila_id'  => $request->input('upazila'),
                'password'    => Hash::make($validated['password']),
                'role'        => 'user',
                'created_by'  => Auth::id(),
                'joining_at'  => Carbon::now(),
                'status'      => 'active',
                'created_at'  => Carbon::now(),
            ]);

            DB::commit();
            return redirect()->route('userlist')->with('message', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function edit($id)
    {
        $user = User::with('branch')->where('id',$id)->first();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'User not found.'
        ], 404);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'branch'   => 'required',
                'name'     => 'required|string|max:255',
                'email'    => 'required|email',
                'mobile'   => 'nullable|string|max:15',
                'whatsapp' => 'nullable|string|max:15',
            ]);

            $id = $request->input('userId');
            $branch = $request->input('branch');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $whatsapp = $request->input('whatsapp');
            $division_id = $request->input('division_id');
            $district_id = $request->input('district_id');
            $upazila_id = $request->input('upazila_id');
            $status = $request->input('status');

            $user = User::findOrFail($id);

            if($user){
                if($branch){
                    $user->branch_id = $branch;
                }
                $user->name = $request->input('name');
                $user->email = $email;
                $user->mobile = $mobile;
                $user->whatsapp = $whatsapp;
                if($division_id){
                    $user->division_id = $division_id;
                }
                if($district_id){
                    $user->district_id = $district_id;
                }
                if($upazila_id){
                    $user->upazila_id = $upazila_id;
                }
                $user->status = $status;

                $res = $user->save();

                DB::commit();
                if($res){
                    return response()->json(['status' => true]);
                }
            }
            
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function adminIndex()
    {
        $data['admins'] = User::where('role', 'admin')->get();

        return view('admin.user.adminindex')->with($data);
    }

    public function createAdmin()
    {
        $data['branches'] = Branch::where('status', 'active')->get();

        return view('admin.user.admin')->with($data);
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'branch'   => ['required'],
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'mobile'   => 'nullable|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'branch_id'  => $validated['branch'],
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'mobile'     => $validated['mobile'],
            'whatsapp'   => $validated['whatsapp'] ?? $validated['mobile'],
            'password'   => Hash::make($validated['password']),
            'role'       => 'admin',
            'created_by' => Auth::id(),
            'joining_at' => Carbon::now(),
            'status'     => 'active',
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('message', 'Admin created successfully.');
    }
}