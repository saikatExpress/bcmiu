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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image', 250)->nullable();
            $table->string('name', 250)->default('Welcome ONNOTOMO Portfolio Management Service');
            $table->string('title', 500)->nullable();
            $table->string('description', 2000)->nullable();
            $table->string('facebook_link', 250)->nullable();
            $table->string('twitter_link', 250)->nullable();
            $table->string('instagram_link', 250)->nullable();
            $table->string('linkedin_link', 250)->nullable();
            $table->integer('created_by')->nullable();
            $table->string('status', 20)->default('1');
            $table->integer('flag')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};