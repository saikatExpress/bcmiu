<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert(
            [
                'id' => 1,
                'title' => 'This is About Section',
                'description' => 'This is About Section',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}