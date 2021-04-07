<?php

/** @var Factory $factory */

use App\Models\SubProjectStatus;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SubProjectStatus::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
