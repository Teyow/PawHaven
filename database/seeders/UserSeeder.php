<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'address' => 'Quezon City',
            'contact_no' => '0912345678',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
            'profile_pic' => 'noimage.jpg',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Christine',
            'last_name' => 'Manabat',
            'address' => 'Quezon City',
            'contact_no' => '0912345678',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'is_admin' => 0,
            'profile_pic' => 'noimage.jpg',
        ]);
    }
}
