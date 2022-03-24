<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'id' => 1,
            'program_title' => 'Direct Animal Care',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '1.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 2,
            'program_title' => 'Office Work',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '2.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 3,
            'program_title' => 'Seminars ',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '3.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 4,
            'program_title' => 'Adoption Team',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '4.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 5,
            'program_title' => 'Events ',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '5.jpg',
        ]);


        DB::table('programs')->insert([
            'id' => 6,
            'program_title' => 'Training and Rehabilitation',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '6.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 7,
            'program_title' => 'Foster Care ',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '7.jpeg',
        ]);

        DB::table('programs')->insert([
            'id' => 8,
            'program_title' => 'Social Media',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '8.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 9,
            'program_title' => 'Clinic Assistant',
            'program_desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, mollitia ad aliquid aliquam modi',
            'program_img' => '9.jpg',
        ]);
    }
}
