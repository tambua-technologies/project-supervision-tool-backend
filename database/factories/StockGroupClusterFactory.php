<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockGroupCluster;
use Faker\Generator as Faker;

$factory->define(StockGroupCluster::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
    ];
});
