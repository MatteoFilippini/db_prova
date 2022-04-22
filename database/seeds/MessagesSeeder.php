<?php

use App\Models\Flat;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $flat_ids = Flat::pluck('id')->toArray();

        for ($i = 0; $i < 8; $i++) {
            $message = new Message();
            $message->content = $faker->paragraph();
            $message->sent = $faker->date('Y-m-d');
            $message->mail_mittente = $faker->email();
            $message->flat_id = Arr::random($flat_ids);;
            $message->save();
        }
    }
}
