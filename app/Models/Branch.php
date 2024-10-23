<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'mobile',
        'whatssapp',
        'address',
        'division',
        'district',
        'thana',
        'created_by',
        'status',
        'flag',
    ];
}