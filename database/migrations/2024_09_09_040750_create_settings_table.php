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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('project_logo', 250)->nullable();
            $table->string('background_color', 250)->nullable();
            $table->string('background_image', 250)->nullable();
            $table->string('project_email', 250)->nullable();
            $table->string('project_mobile', 250)->nullable();
            $table->string('project_mobile1', 25)->nullable();
            $table->string('project_whatsapp', 20)->nullable();
            $table->string('project_link', 250)->nullable();
            $table->string('facebook_link', 250)->nullable();
            $table->string('twitter_link', 250)->nullable();
            $table->string('instagram_link', 250)->nullable();
            $table->string('linkedin_link', 250)->nullable();
            $table->string('youtube_link', 250)->nullable();
            $table->string('project_address', 500)->nullable();
            $table->integer('view_mode')->nullable();
            $table->integer('onOff')->nullable();
            $table->string('onOffText', 250)->nullable();
            $table->integer('isUpdatenews')->default(0)->nullable();
            $table->integer('userChart')->default(0)->nullable();
            $table->integer('maintainence_mode')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};