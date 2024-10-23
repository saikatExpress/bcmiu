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
            ],
        ]);
    }
}