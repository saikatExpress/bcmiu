<?php

namespace App\Http\Controllers\admin;

use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index()
    {
        $data['branches'] = Branch::latest()->get();

        return view('admin.branch.index')->with($data);
    }

    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name'   => ['required', 'max:250', 'min:2'],
                'mobile' => ['unique:branches,mobile']
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $branchObj = new Branch();

            $branchObj->name       = Str::title($request->input('name'));
            $branchObj->slug       = Str::slug($request->input('name'), '-');
            $branchObj->email      = $request->input('email');
            $branchObj->mobile     = $request->input('mobile');
            $branchObj->whatssapp  = $request->input('whatsapp')  ?? $request->input('mobile');
            $branchObj->address    = $request->input('address');
            $branchObj->division   = $request->input('division');
            $branchObj->district   = $request->input('district');
            $branchObj->thana      = $request->input('thana');
            $branchObj->created_by = Auth::id();
            $branchObj->status     = 'active';
            $branchObj->flag       = 0;

            $res = $branchObj->save();

            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Branch created successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name'   => ['required', 'max:250', 'min:2'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

        $id = $request->input('branch-id');
            $branch = Branch::find($id);

            $branch->name       = Str::title($request->input('name'));
            $branch->slug       = Str::slug($request->input('name'), '-');
            $branch->email      = $request->input('email');
            $branch->mobile     = $request->input('mobile');
            $branch->whatssapp  = $request->input('whatsapp');
            $branch->address    = $request->input('address');
            $branch->division   = $request->input('division');
            $branch->district   = $request->input('district');
            $branch->thana      = $request->input('thana');
            $branch->created_by = Auth::id();
            $branch->status     = 'active';
            $branch->flag       = 0;

            $res = $branch->save();

            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Branch updated successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return response()->json(['success' => 'Branch deleted successfully']);
    }

}