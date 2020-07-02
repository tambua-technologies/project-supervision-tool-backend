<?php

/** @var Factory $factory */

use App\Models\HRType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(HRType::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
    ];
});
