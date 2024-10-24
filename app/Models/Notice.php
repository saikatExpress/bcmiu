<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'notice_image',
        'title',
        'content',
        'type',
        'publish_date',
        'effective_date',
        'privacy_type',
        'created_by',
        'updated_by',
        'status',
        'contact_email',
        'contact_phone',
    ];
}