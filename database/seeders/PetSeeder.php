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
            'type' => 'Dog',
            'breed' => 'Shih Tzu',
            'gender' => 'Male',
            'stage' => 'Adult',
            'age' => '3',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 1,
            'size' => 'Medium',
            'color' => 'Brown',
            'personality' => 'Energetic',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Kiwkiw is always mad',
            'pet_image' => '["Kiwkiw1.jpg","Kiwkiw2.jpg","Kiwkiw3.jpg","Kiwkiw4.jpg"]',
        ]);

        DB::table('pets')->insert([
            'id' => 2,
            'name' => 'Toby',
            'type' => 'Dog',
            'breed' => 'Shih Tzu',
            'gender' => 'Male',
            'stage' => 'Junior',
            'age' => '8',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 2,
            'size' => 'Medium',
            'color' => 'Black',
            'personality' => 'Loyal',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Toby is loyal to his owner and easy to get along with. His favorite dish is adobo pork. Toby will help you to relax and he loves to play with his favorite bear stuff toy. ',
            'pet_image' => '["276056613_259762983037450_7779293080884925458_n.jpg","275989699_1345654532601598_4502901265824861232_n.jpg","275776708_473908514471594_4835116685394888443_n.jpg","275764704_381621407118266_5380417870751778524_n.jpg"]',
        ]);


        DB::table('pets')->insert([
            'id' => 3,
            'name' => 'Austin',
            'type' => 'Dog',
            'breed' => 'Pitbull',
            'gender' => 'Female',
            'stage' => 'Young Adult',
            'age' => '2',
            'unit' => 'Year(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 3,
            'size' => 'Large',
            'color' => 'Black',
            'personality' => 'Intellectual',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Austin is doing great things to make his owner happy, and in turn, they tend to make him lively by cheering his owner mood. Sometimes Austin need to train because when she sees some cars she chase them to stop and bark without doing nothing.',
            'pet_image' => '["Unknown.jpeg","5f065407233ef2c2ed2ea5ba0c5a00eb.jpg","9f785ceffb8e499eb90e97b138bdd867.jpg","0e58ce5b0b9d1fc2e348ec6acb8d158e.jpg"]',
        ]);

        DB::table('pets')->insert([
            'id' => 4,
            'name' => 'Luna',
            'type' => 'Dog',
            'breed' => 'Dachshund',
            'gender' => 'Female',
            'stage' => 'Junior',
            'age' => '7',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 4,
            'size' => 'Small',
            'color' => 'Black',
            'personality' => 'Toublesome',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Luna is a troublesome dog when she does teething, and he constantly chews the furniture. She needs to be properly trained and you will always need to buy her a chewing treats so that your furniture will not be chewed.',
            'pet_image' => '["dachshund_1.jpg","file_fanbskjeg5hw9-waera84_adffskjoty.jpeg","dachshund_541_0_600.jpg","file_23020_dachshund-dog-breed.jpg"]',
        ]);

        DB::table('pets')->insert([
            'id' => 5,
            'name' => 'Jack',
            'type' => 'Dog',
            'breed' => 'Siberian Husky',
            'gender' => 'Male',
            'stage' => 'Puppy',
            'age' => '6',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 5,
            'size' => 'Small',
            'color' => 'Black',
            'personality' => 'Smart',
            'healthInfo' => '["Neutered","No Ailments"]',
            'about' => 'Jack is quick to learn. He is a smart dog, obedient, calm for a puppy, and great with the kids and cat ',
            'pet_image' => '["587159e96923ecaa3248bd92e2951647.jpg","Siberian-Husky_FeaturedImage-1024x615.jpg","siberian-husky-card-small.jpg","image.jpeg"]',
        ]);
        DB::table('pets')->insert([
            'id' => 6,
            'name' => 'Antonio',
            'type' => 'Dog',
            'breed' => 'Aspin',
            'gender' => 'Female',
            'stage' => 'Junior',
            'age' => '7',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 6,
            'size' => 'Small',
            'color' => 'Black',
            'personality' => 'Faithful',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Antonio, is dependable, loyal and curious. Usually high-energy dogs and it is not applicable for the first time dog owners.',
            'pet_image' => '["Askal_(aspin)_dog_Masinloc,_Zambales.jpg","askal-philippines-MAIN.jpg","images.jpeg","2200Standing_thin_Askal_on_Philippines_roads_05.jpg"]',
        ]);
        DB::table('pets')->insert([
            'id' => 7,
            'name' => 'Coleen',
            'type' => 'Cat',
            'breed' => 'Siamese',
            'gender' => 'Female',
            'stage' => 'Kitten',
            'age' => '1',
            'unit' => 'Year(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 7,
            'size' => 'Small',
            'color' => 'Seal point',
            'personality' => 'Unfriendly',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Coleen is a shy cat. When you have a friend in your house, Coleen will hide behind the furniture.',
            'pet_image' => '["facts-about-siamese-cats-4173491-hero-5a607df9e57b40a58c803a76859b6694.jpg","siamese-cat-cover-1054x791.jpg","siamese_3.jpg","photo-1568152950566-c1bf43f4ab28.jpeg"]',
        ]);
        DB::table('pets')->insert([
            'id' => 8,
            'name' => 'Angela',
            'type' => 'Cat',
            'breed' => 'Persian',
            'gender' => 'Female',
            'stage' => 'Mature Adult',
            'age' => '7',
            'unit' => 'Year(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 8,
            'size' => 'Small',
            'color' => 'Grey',
            'personality' => 'Caring',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'With their snub noses, chubby cheeks, and long hair, Angela is quite an exquisite breed. They’re also typically quiet and affectionate cats who enjoy being held, but they’re content just lounging around too.',
            'pet_image' => '["image.jpeg","images.jpeg","Unknown.jpeg","Unknowns.jpeg"]',
        ]);
        DB::table('pets')->insert([
            'id' => 9,
            'name' => 'Trisha',
            'type' => 'Cat',
            'breed' => 'Sphynx',
            'gender' => 'Female',
            'stage' => 'Young Adult',
            'age' => '5',
            'unit' => 'Year(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 9,
            'size' => 'Small',
            'color' => 'Black',
            'personality' => 'Friendly',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Trisha can be man’s best friend and they are generally playful pets. She love to play balls',
            'pet_image' => '["mink-bi-color-sphynx-facts1.jpg","images.jpeg","Unknowns.jpeg","Unknown.jpeg"]',
        ]);


        DB::table('pets')->insert([
            'id' => 10,
            'name' => 'Coco',
            'type' => 'Dog',
            'breed' => 'Poodle',
            'gender' => 'Female',
            'stage' => 'Junior',
            'age' => '4',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 10,
            'size' => 'Small',
            'color' => 'Black',
            'personality' => 'Humble',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Coco is a active pet with a decent personality and kind but will always hunt your shoes and anything that is colored white.',
            'pet_image' => '["POODLE_DOG_1.jpg","POODLE_DOG_2.jpg","POODLE_DOG_3.jpg","POODLE_DOG_4.jpg"]',
        ]);


        DB::table('pets')->insert([
            'id' => 11,
            'name' => 'Martin',
            'type' => 'Cat',
            'breed' => 'Ragdoll',
            'gender' => 'Male',
            'stage' => 'Junior',
            'age' => '5',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 11,
            'size' => 'Small',
            'color' => 'White',
            'personality' => 'Kind',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Martin is a very kind cat and will help your household be secuard with pest.',
            'pet_image' => '["RAGDOLL_CAT_1.jpg","RAGDOLL_CAT_2.png","RAGDOLL_CAT_3.jpg","RAGDOLL_CAT_4.png"]',
        ]);


        DB::table('pets')->insert([
            'id' => 12,
            'name' => 'Haven',
            'type' => 'Cat',
            'breed' => 'Munchkin',
            'gender' => 'Female',
            'stage' => 'Junior',
            'age' => '2',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 12,
            'size' => 'Very Small',
            'color' => 'Orange',
            'personality' => 'Passive',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Haven is a passive cat and will always sleep on cold places.',
            'pet_image' => '["MUNCHKIN_CAT_1.jpg","MUNCHKIN_CAT_2.jpg","MUNCHKIN_CAT_3.jpg","MUNCHKIN_CAT_4.jpg"]',
        ]);




        DB::table('pets')->insert([
            'id' => 13,
            'name' => 'Hex',
            'type' => 'Cat',
            'breed' => 'Bengal',
            'gender' => 'Male',
            'stage' => 'Junior',
            'age' => '9',
            'unit' => 'Month(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 13,
            'size' => 'Very Small',
            'color' => 'Tiger Color',
            'personality' => 'Very Active',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Hex is a very active at any scenario because of the bloodline and will always play with your hair.',
            'pet_image' => '["BENGAL_CAT_1.jpg","BENGAL_CAT_2.jpg","BENGAL_CAT_3.jpg","BENGAL_CAT_4.jpg"]',
        ]);




        DB::table('pets')->insert([
            'id' => 14,
            'name' => 'Jose',
            'type' => 'Dog',
            'breed' => 'Labrador Retriever',
            'gender' => 'Male',
            'stage' => 'Senior',
            'age' => '2',
            'unit' => 'Years(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 14,
            'size' => 'Large',
            'color' => 'Brown and White',
            'personality' => 'Charming',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Jose is a kind dog and will always make time to play with you.',
            'pet_image' => '["LR_DOG_1.jpg","LR_DOG_2.jpg","LR_DOG_3.jpg","LR_DOG_4.jpg"]',
        ]);


        DB::table('pets')->insert([
            'id' => 15,
            'name' => 'Boy',
            'type' => 'Dog',
            'breed' => 'American Eskimo',
            'gender' => 'Male',
            'stage' => 'Senior',
            'age' => '4',
            'unit' => 'Years(s)',
            'is_adopted' => '0',
        ]);

        DB::table('pet_profiles')->insert([
            'pet_id' => 15,
            'size' => 'Large',
            'color' => 'White',
            'personality' => 'Active',
            'healthInfo' => '["Vaccinated","No Ailments"]',
            'about' => 'Boy is a kind dog and will always want to play outside.',
            'pet_image' => '["AE_DOG_1.jpg","AE_DOG_2.jpg","AE_DOG_3.jpg","AE_DOG_4.png"]',
        ]);
    }
}
