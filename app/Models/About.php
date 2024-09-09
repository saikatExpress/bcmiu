<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_image',
        'right_image',
        'left_image',
        'top_image',
        'title',
        'description',
        'status',
        'updated_by',
    ];

    protected $casts = [
        'id'          => 'integer',
        'main_image'  => 'string',
        'right_image' => 'string',
        'left_image'  => 'string',
        'top_image'   => 'string',
        'title'       => 'string',
        'description' => 'string',
        'status'      => 'string',
        'updated_by'  => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];
}