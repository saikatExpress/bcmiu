<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::insert(
            [
                'id'         => 1,
                'name'       => 'Test Group',
                'slug'       => Str::slug('Test Group', '-'),
                'created_by' => 999,
                'status'     => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'         => 2,
                'name'       => 'Final Group',
                'slug'       => Str::slug('Final Group', '-'),
                'created_by' => 999,
                'status'     => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        );
    }
}