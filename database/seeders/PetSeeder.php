<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'id' => 1,
            'name' => 'Kiwkiw', 
            'type' => 'Dog' ,
            'breed' => 'Shih Tzu' ,
            'gender' => 'Male' ,
            'stage' => 'Adult' ,
            'age' => '3',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 1,
            'size' => 'Medium',
            'color' => 'Brown', 
            'personality' => 'Energetic',
            'healthInfo' => '["Vaccinated","No Ailments"]' ,
            'about' => 'Kiwkiw is always mad', 
            'pet_image' => '["WIN_20220202_15_06_55_Pro.jpg","WIN_20220202_15_06_57_Pro.jpg","WIN_20220202_15_06_59_Pro.jpg","WIN_20220202_15_07_23_Pro.jpg"]', 
        ]);
        

    }
}
