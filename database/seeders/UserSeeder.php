<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now      = Carbon::now();
        $password = '123456';

        User::insert([
            [
                'id'         => 999,
                'name'       => 'Super Admin',
                'email'      => 'superadmin@gmail.com',
                'mobile'     => '01713761685',
                'whatsapp'   => '01713761685',
                'address'    => 'Nikunjo,Khilkhet,Dhaka',
                'password'   => Hash::make($password),
                'role'       => 'super-admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'          => 1000,
                'name'        => 'Sharif Mandol',
                'email'       => 'sharif@gmail.com',
                'mobile'      => '01703761685',
                'whatsapp'    => '01703761685',
                'division_id' => 8,
                'district_id' => 64,
                'upazila_id'  => 490,
                'address'     => 'Banasree,Rampura,Dhaka',
                'password'    => Hash::make($password),
                'role'        => 'user',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}