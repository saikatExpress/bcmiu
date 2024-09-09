<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\FAQ;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
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
        $faqs = FAQ::all();

        return view('admin.website.faqindex', compact('faqs'))->render();
    }

    public function create()
    {
        if(auth()->user()->role === 'user'){
            return redirect()->back()->with('error', 'This page is not permitted for you.!');
        }

        return view('admin.website.createfaq')->render();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'title'       => ['required'],
                'description' => ['required'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $faqObj = new FAQ();

            $faqObj->name        = $request->input('title');
            $faqObj->title       = Str::title($request->input('title'));
            $faqObj->description = Str::title($request->input('description'));
            $faqObj->created_by  = auth()->user()->id;
            $faqObj->created_at  = Carbon::now();

            $res = $faqObj->save();

            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Faq created successfully');
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
                'title'       => ['required'],
                'description' => ['required'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $id = $request->input('faqId');

            $faq = FAQ::findOrFail($id);

            $faq->name        = $request->input('title');
            $faq->title       = Str::title($request->input('title'));
            $faq->description = Str::title($request->input('description'));
            $faq->created_by  = auth()->user()->id;
            $faq->updated_at  = Carbon::now();

            $res = $faq->save();

            DB::commit();
            if($res){
                return redirect()->back()->with('message', 'Faq update successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $faq = FAQ::where('id', $id)->first();

            if (!$faq) {
                return response()->json(['message' => 'FAQ not found.'], 404);
            }

            $res = $faq->delete();

            if ($res) {
                DB::commit();
                return response()->json(['message' => 'FAQ deleted successfully.']);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'An error occurred while deleting the FAQ.'], 500);
        }
    }
}