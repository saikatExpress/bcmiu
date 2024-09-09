<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'whatsapp',
        'profile_image',
        'avatar_link',
        'trading_code',
        'bo_id',
        'bank_name',
        'bank_branch',
        'bank_account_no',
        'address',
        'dob',
        'gender',
        'fb_link',
        'twitter_link',
        'email_verified_at',
        'otp',
        'password',
        'created_by',
        'user-agent',
        'role',
        'login_at',
        'logout_at',
        'joining_at',
        'status',
        'block',
        'terms_condition',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];
}