<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $users = User::where('role', 'user')->latest()->paginate(10);
        $branches = Branch::where('status', 'active')->get();
        
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