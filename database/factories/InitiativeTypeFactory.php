<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InitiativeType;
use Faker\Generator as Faker;

$factory->define(InitiativeType::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'type' => $faker->word,
        'description' => $faker->word,
    ];
});
