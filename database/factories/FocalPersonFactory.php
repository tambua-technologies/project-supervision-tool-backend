<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FocalPerson;
use Faker\Generator as Faker;

$factory->define(FocalPerson::class, function (Faker $faker) {

    return [
        'fist_name' => $faker->word,
        'last_name' => $faker->word,
        'middle_name' => $faker->word,
        'phone' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
