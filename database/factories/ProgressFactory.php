<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Progress;
use Faker\Generator as Faker;

$factory->define(Progress::class, function (Faker $faker) {

    return [
        'planned' => $faker->randomDigitNotNull,
        'actual' => $faker->randomDigitNotNull,
        'ahead' => $faker->randomDigitNotNull,
        'behind' => $faker->randomDigitNotNull,
    ];
});
