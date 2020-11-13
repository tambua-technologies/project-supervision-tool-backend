<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'code' => $faker->text(5),
    ];
});
