<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::latest()->get();

        return view('admin.group.index')->with($data);
    }

    public function create()
    {
        return view('admin.group.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => ['required','unique:groups','max:255'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $groupObj = new Group();

            $groupObj->name       = Str::title($request->input('name'));
            $groupObj->slug       = Str::slug($request->input('name'), '-');
            $groupObj->created_by = auth()->user()->id;
            $groupObj->status     = 'active';

            $res = $groupObj->save();
            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Group create successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function edit($id) 
    {
        $group = Group::find($id);
        return response()->json($group);
    }

    public function update(Request $request, $id) 
    {
        $group = Group::find($id);
        
        $group->name   = Str::title($request->input('name'));
        $group->slug   = Str::slug($request->input('name'), '-');
        $group->status = $request->input('status');

        $group->save();
        
        return response()->json(['message' => 'Group updated successfully!', 'group' => $group]);
    }

    public function destroy($id)
    {
        try {
            if(auth()->user()->role !== 'super-admin'){
                return response()->json(['status' => false, 'message' => 'This action is not permitted for you.']); 
            }
            $group = Group::findOrFail($id);
            
            $group->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Group deleted successfully!',
                'group_id' => $id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete the group: ' . $e->getMessage()
            ], 500);
        }
    }

}