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
            'program_desc' => 'Volunteers in this program have the chance to do variety tasks such as walking, bathe the dogs, groom, socialize with cats, clean cages and feed the pets.',
            'program_img' => '1.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 2,
            'program_title' => 'Office Work',
            'program_desc' => 'Volunteers in this program must be familiar with the policies imposed by the shelter in order to help in assisting the visitor, answer calls and inquiry and do paper works.',
            'program_img' => '2.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 3,
            'program_title' => 'Seminars ',
            'program_desc' => 'Volunteers in this program conduct seminars on institutions to educate about responsible pet ownership, importance of neutering and other animal welfare issues.',
            'program_img' => '3.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 4,
            'program_title' => 'Adoption Team',
            'program_desc' => 'Volunteers in this program interview the applicants who wants to adopt a pet. They do on-site visit of the home to ensure that the pet will be on loving families.',
            'program_img' => '4.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 5,
            'program_title' => 'Events ',
            'program_desc' => 'Volunteers in this program implements an event that would encourage in helping our shelter such as fundraising, setting up booths, handing out flyers and etc.',
            'program_img' => '5.jpg',
        ]);


        DB::table('programs')->insert([
            'id' => 6,
            'program_title' => 'Training and Rehabilitation',
            'program_desc' => 'Volunteers in this program must undergo first with our Dog Behavior Specialist. This program helps animals prepare for adoption and train them the proper behavior.',
            'program_img' => '6.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 7,
            'program_title' => 'Foster Care ',
            'program_desc' => 'Volunteers in this program are willing to adopt a pet and be their family to be with. Adopting and volunteering at the same time saves more animals in shelter.',
            'program_img' => '7.jpeg',
        ]);

        DB::table('programs')->insert([
            'id' => 8,
            'program_title' => 'Social Media',
            'program_desc' => 'Volunteers in this program are assigned to promote the social media accounts of the shelter and make our community bigger by posting, uploading and sharing updates.',
            'program_img' => '8.jpg',
        ]);

        DB::table('programs')->insert([
            'id' => 9,
            'program_title' => 'Clinic Assistant',
            'program_desc' => 'Volunteers in this program must have prior knowledge with regards to clinical or surgical procedures as they will be dealing on rescuing the lives of our pets.',
            'program_img' => '9.jpg',
        ]);
    }
}
