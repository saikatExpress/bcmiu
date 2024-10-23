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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('slug', 250)->nullable();
            $table->string('mobile', 25)->unique()->nullable();
            $table->string('email', 25)->unique()->nullable();
            $table->string('whatssapp', 25)->nullable();
            $table->string('address', 500)->nullable();
            $table->integer('division')->nullable();
            $table->integer('district')->nullable();
            $table->integer('thana')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('status', 50)->default('active')->nullable();
            $table->integer('flag')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};