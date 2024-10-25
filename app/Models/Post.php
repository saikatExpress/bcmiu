<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'division_id',
        'content',
        'media',
        'status',
        'is_approve',
        'flag',
    ];
}