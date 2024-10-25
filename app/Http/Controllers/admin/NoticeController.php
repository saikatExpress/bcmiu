<?php

namespace App\Http\Controllers\admin;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    public function __construct() {
        if(!Auth::check()){
            return redirect()->route('logout.us');
        }
    }

    public function index(Request $request)
    {   
        $data['notices'] = Notice::latest()->get();
        
        return view('admin.notice.index')->with($data);
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'type'           => 'required|string',
            'publish_date'   => 'required|date',
            'effective_date' => 'nullable|date',
            'status'         => 'required|string',
            'contact_email'  => 'nullable|email',
            'contact_phone'  => 'nullable|string',
            'privacy_type'   => 'required|string',
            'notice_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();

        if($request->hasFile('notice_image')){
            $image = $request->file('notice_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('notices'), $imageName);
            $data['notice_image'] = 'notices/' . $imageName;
        }

        Notice::create($data);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    public function data(Request $request)
    {
        $notices = Notice::query();

        return DataTables::of($notices)
            ->editColumn('publish_date', function ($notice) {
                return $notice->publish_date->format('Y-m-d');
            })
            ->editColumn('effective_date', function ($notice) {
                return $notice->effective_date ? $notice->effective_date->format('Y-m-d') : 'N/A';
            })
            ->editColumn('created_at', function ($notice) {
                return $notice->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($notice) {
                return $notice->updated_at->format('Y-m-d H:i:s');
            })
            ->make(true);
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return response()->json(['success' => 'Notice deleted successfully']);
    }
}