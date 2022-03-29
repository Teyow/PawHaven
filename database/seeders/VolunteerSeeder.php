<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Robby De Leon',
            'program' => 'Direct Animal Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:01',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Christine Manabat',
            'program' => 'Office Work',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:02',
        ]);


        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Theo Roldan',
            'program' => 'Seminars',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:03',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Cyrix Ponce',
            'program' => 'Adoption Team',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:04',
        ]);


        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Christian Santos',
            'program' => 'Events',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:05',
        ]);


        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Patrick Bambico',
            'program' => 'Training and Rehabilitation',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:06',
        ]);



        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Hans Laya',
            'program' => 'Foster Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:07',
        ]);



        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Kimberly Rabusa',
            'program' => 'Social Media',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:08',
        ]);
        
        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'John Delagdon',
            'program' => 'Clinic Assistant',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:09',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Sirjean Nunez',
            'program' => 'Direct Animal Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:10',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Ron Eduardo',
            'program' => 'Direct Animal Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:11',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Carla Ulit',
            'program' => 'Direct Animal Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:12',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Kimberly Manabat',
            'program' => 'Events',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:13',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Rogie Tumaliuan',
            'program' => 'Events',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:14',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Christine Manabat',
            'program' => 'Adoption Team',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:15',
        ]);

        DB::table('volunteers')->insert([
            'user_id' => '2',
            'full_name' => 'Robby De Leon',
            'program' => 'Direct Animal Care',
            'date_start' => '28/03/2022',
            'date_end' => '30/03/2022',
            'is_approved' => '0',
            'created_at' => '2022-03-29 15:14:16',
        ]);
    }
}
