<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_image',
        'name',
        'title',
        'description',
        'created_by',
        'status',
        'flag',
    ];

    protected $casts = [
        'id'            => 'integer',
        'service_image' => 'string',
        'name'          => 'string',
        'title'         => 'string',
        'description'   => 'string',
        'created_by'    => 'integer',
        'status'        => 'string',
        'flag'          => 'integer',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
}