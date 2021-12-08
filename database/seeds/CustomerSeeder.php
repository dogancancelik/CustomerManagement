<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('customers')->insert([
                'company_id' => rand(1,2),
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'identification_number' => $faker->numerify('###########'),
                'year_of_birth' => rand(1940,2021),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'is_active' => rand(0,1),
            ]);
        }
    }
}
