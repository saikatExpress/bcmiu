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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('main_image', 250)->nullable();
            $table->string('right_image', 250)->nullable();
            $table->string('left_image', 250)->nullable();
            $table->string('top_image', 250)->nullable();
            $table->string('title', 500)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('status', 50)->default('active');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};