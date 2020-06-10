<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockStatuses;
use Faker\Generator as Faker;

$factory->define(StockStatuses::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
