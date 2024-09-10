<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
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
        $search = $request->input('search');
        $filterBy = $request->input('filterBy');

        $query = User::query()->where('role', 'user');

        if ($search) {
            switch ($filterBy) {
                case 'name':
                    $query->where('name', 'like', "%$search%");
                    break;
                case 'email':
                    $query->where('email', 'like', "%$search%");
                    break;
                case 'mobile':
                    $query->where('mobile', 'like', "%$search%");
                    break;
                case 'whatsapp':
                    $query->where('whatsapp', 'like', "%$search%");
                    break;
                default:
                    break;
            }
        }

        $users = $query->paginate(10);

        return view('admin.user.index', compact('users'));

    }

    public function fetchUsers(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search');
            $filterBy = $request->input('filterBy');

            $query = User::query()->where('role', 'user');

            if ($search) {
                switch ($filterBy) {
                    case 'name':
                        $query->where('name', 'like', "%$search%");
                        break;
                    case 'email':
                        $query->where('email', 'like', "%$search%");
                        break;
                    case 'mobile':
                        $query->where('mobile', 'like', "%$search%");
                        break;
                    case 'whatsapp':
                        $query->where('whatsapp', 'like', "%$search%");
                        break;
                    default:
                        break;
                }
            }

            $users = $query->paginate(10);

            return view('admin.user.partials.user_table', compact('users'))->render();
        }
    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'mobile'   => 'nullable|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'mobile'     => $validated['mobile'],
            'whatsapp'   => $validated['whatsapp'],
            'password'   => Hash::make($validated['password']),
            'role'       => 'user',
            'created_by' => Auth::id(),
            'joining_at' => Carbon::now(),
            'status'     => 'active',
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('userlist')->with('message', 'User created successfully.');
    }
}