<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Flat;
use App\Models\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $flat_ids = Flat::pluck('id')->toArray();

        for ($i = 0; $i < count($flat_ids); $i++) {
            $address = new Address();
            $address->denomination = $faker->word();
            $address->address = $faker->word();
            $address->street_number = $faker->randomDigit();
            $address->floor = $faker->randomDigit();
            $address->zip_code = $faker->randomNumber(5, true);
            $address->city = $faker->word();
            $address->region = $faker->word();

            $address->flat_id = $i + 1;
            $address->save();
        }
    }
}
