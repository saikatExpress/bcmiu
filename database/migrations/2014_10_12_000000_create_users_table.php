<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('name', 250);
            $table->string('email', 250)->unique();
            $table->string('mobile', 20)->unique();
            $table->string('whatsapp', 20)->nullable();
            $table->string('profile_image', 250)->nullable();
            $table->string('avatar_link', 250)->nullable();
            $table->string('trading_code', 250)->nullable();
            $table->string('bo_id', 250)->nullable();
            $table->string('bank_name', 250)->nullable();
            $table->string('bank_branch', 250)->nullable();
            $table->string('bank_account_no', 250)->nullable();
            $table->string('address', 500)->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('gender', 30)->nullable();
            $table->string('fb_link', 250)->nullable();
            $table->string('twitter_link', 250)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('otp', 5)->nullable();
            $table->string('password', 250);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('user-agent', 250)->nullable();
            $table->string('role', 100)->default('user');
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
            $table->timestamp('joining_at')->nullable();
            $table->rememberToken();
            $table->string('status', 50)->default('active');
            $table->integer('block')->default(0);
            $table->integer('flag')->default(0)->nullable();
            $table->integer('terms_condition')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};