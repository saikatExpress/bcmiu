<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
        'name',
        'title',
        'description',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'created_by',
        'status',
        'flag',
    ];

    protected $casts = [
        'id'             => 'integer',
        'banner_image'   => 'string',
        'name'           => 'string',
        'title'          => 'string',
        'description'    => 'string',
        'facebook_link'  => 'string',
        'twitter_link'   => 'string',
        'instagram_link' => 'string',
        'linkedin_link'  => 'string',
        'created_by'     => 'integer',
        'status'         => 'string',
        'flag'           => 'integer',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];
}