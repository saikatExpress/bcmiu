<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function index()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        $services = Service::where('status', 'active')->get();

        return view('admin.website.serviceindex', compact('services'))->render();
    }

    public function create()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        return view('admin.website.service')->render();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'service_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'          => 'nullable|string|max:250',
                'title'         => 'required|string|max:500',
                'description'   => 'required|string',
                'status'        => 'nullable|string|in:active,inactive',
            ]);

            $service = new Service();

            if ($request->hasFile('service_image')) {
                $file = $request->file('service_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('serviceimages'), $filename);
                $service->service_image = $filename;
            }


            $service->name        = $request->name;
            $service->title       = $request->title;
            $service->description = $request->description;
            $service->status      = $request->status;
            $service->created_by  = auth()->id();

            $res = $service->save();
            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Service added successfully!');
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

            $validated = $request->validate([
                'service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name'          => 'nullable|string|max:250',
                'title'         => 'required|string|max:500',
                'description'   => 'required|string',
                'status'        => 'nullable|string|in:active,inactive',
            ]);
            $id = $request->input('serviceId');
            $service = Service::findOrFail($id);

            if($service){
                if ($request->hasFile('service_image')) {
                    $filename = $service->service_image;
                    if (file_exists(public_path('serviceimages/' . $filename))) {
                        unlink(public_path('serviceimages/' . $filename));
                    }
                    $file = $request->file('service_image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('serviceimages'), $filename);
                    $service->service_image = $filename;
                }

                $service->name        = $request->name;
                $service->title       = $request->title;
                $service->description = $request->description;
                $service->status      = $request->status;
                $service->created_by  = auth()->id();
                $service->updated_at  = Carbon::now();

                $res = $service->save();
                DB::commit();
                if($res){
                    return redirect()->back()->with('message', 'Service updated successfully!');
                }
            }
            return redirect()->back()->with('error', 'Service not found!');
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $service = Service::where('id', $id)->first();

            if (!$service) {
                return response()->json(['message' => 'Service not found.'], 404);
            }

            $filename = $service->service_image;

            if ($filename) {
                Storage::disk('public')->delete('serviceimages/' . $filename);

                File::delete(public_path('serviceimages/' . $filename));
            }

            $res = $service->delete();

            DB::commit();
            if($res){
                return response()->json(['message' => 'Service deleted successfully.']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }
}