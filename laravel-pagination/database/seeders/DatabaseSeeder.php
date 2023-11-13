<?php
use Illuminate\Database\Seeder;
// Import DB and Faker services
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach (range(1, 100) as $index) {

            /* 
            DB::table('employees')->insert([
                 'firstname' => $faker->firstname,
                 'lastname' => $faker->lastname,
                 'email' => $faker->email,
                 'dob' => $faker->date('d m Y')
             ]);
 */

            DB::table('flights')->insert([
                'company' => $faker->company,
                'confirmed' => $faker->boolean,
                'departtime' => $faker->time,
                'ticketprice' => $faker->randomFloat(2, 1, 100),
                'description' => $faker->text,
                'depart' => $faker->city,
                'destination' => $faker->city,
            ]);


        }
    }
}