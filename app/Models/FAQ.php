<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'created_by',
    ];

    protected $casts = [
        'id'          => 'integer',
        'name'        => 'string',
        'title'       => 'string',
        'description' => 'string',
        'created_by'  => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];
}