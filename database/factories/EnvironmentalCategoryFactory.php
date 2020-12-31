<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EnvironmentalCategory;
use Faker\Generator as Faker;

$factory->define(EnvironmentalCategory::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence,
        'description' => $faker->text
    ];
});
