<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubProject;
use Faker\Generator as Faker;

$factory->define(SubProject::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word
    ];
});
