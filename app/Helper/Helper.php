<?php

use App\Models\Branch;
use App\Models\User;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;

function welcome()
{
    $msg = "Welcome to Bangladesh Capital Market Investor Unity Association";
    return $msg;
}

function divisionName($id)
{
    if($id){
        $division = Division::find($id);
        return $division->name;
    }

    return 'N/A';
}

function districtName($id)
{
    if($id){
        $district = District::find($id);
        return $district->name;
    }

    return 'N/A';
}

function upazilaName($id)
{
    if($id){
        $upazila = Upazila::find($id);
        return $upazila->name;
    }

    return 'N/A';
}

function getName($id)
{
    if($id){
        $name = User::find($id);
        return $name->name;
    }

    return 'N/A';
}

function branchName($id)
{
    if($id){
        $name = Branch::find($id);
        return $name->name;
    }

    return 'N/A';
}

function totalMessage()
{
    return Notice::where('type', 'public')->count();
}

function messages()
{
    $notices = Notice::where('type', 'public')->get();

    return $notices;
}

function projectName()
{
    $name = Setting::first();
    return $name->project_name;
}