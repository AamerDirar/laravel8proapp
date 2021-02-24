<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Students fake data
        // $faker = Faker::create();
        // foreach (range(1, 100) as $index) {
        //     DB::table('students')->insert([
        //         'name'  => $faker->name,
        //         'email' => $faker->email,
        //         'phone' => $faker->phoneNumber,
        //     ]);
        // }

        // Pages fake data
        // $faker = Faker::create();
        // foreach (range(1, 100) as $index) {
        //     DB::table('pages')->insert([
        //         'title'  => $faker->text(40),
        //         'body' => $faker->text(300)
        //     ]);
        // }

         // User fake data
         $faker = Faker::create();
         foreach (range(1, 100) as $index) {
             DB::table('users')->insert([
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail(),
                'password'   => encrypt('12345678'),
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month')
             ]);
         }
    }
}
