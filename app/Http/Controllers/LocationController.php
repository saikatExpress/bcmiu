<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDivisions()
    {
        $divisions = Division::all();
        return response()->json(['divisions' => $divisions]);
    }

    // Get districts based on division ID
    public function getDistricts($divisionId)
    {
        $districts = District::where('division_id', $divisionId)->get();
        return response()->json(['districts' => $districts]);
    }

    // Get upazilas based on district ID
    public function getUpazilas($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->get();
        return response()->json(['upazilas' => $upazilas]);
    }
}