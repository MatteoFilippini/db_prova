<?php

use App\Models\Flat;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class FlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $flat = new Flat();
            $flat->title = $faker->paragraph();
            $flat->rooms = $faker->randomDigit();
            $flat->beds = $faker->randomDigit();
            $flat->bathrooms = $faker->randomDigit();
            $flat->square_meters = $faker->randomNumber(4, false);
            $flat->image = $faker->imageUrl(400, 400);
            $flat->visible = $faker->boolean();
            $flat->user_id = Arr::random($user_ids);;
            $flat->save();
        }
    }
}
