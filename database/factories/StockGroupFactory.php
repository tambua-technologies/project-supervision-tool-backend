<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockGroup;
use App\Models\StockGroupCluster;
use Faker\Generator as Faker;

$factory->define(StockGroup::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'stock_group_cluster_id' => function () {
            return StockGroupCluster::query()->inRandomOrder()->first()->id;
        },
    ];
});
