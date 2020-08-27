<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActorType;
use Faker\Generator as Faker;

$factory->define(ActorType::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'type' => $faker->word,
        'description' => $faker->word,
    ];
});
