<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Theme;
use Faker\Generator as Faker;

$factory->define(Theme::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
