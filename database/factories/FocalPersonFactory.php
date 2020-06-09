<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FocalPerson;
use Faker\Generator as Faker;

$factory->define(FocalPerson::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'middle_name' => $faker->firstName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => 'password',
    ];
});
