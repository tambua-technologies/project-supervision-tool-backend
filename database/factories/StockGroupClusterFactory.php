<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockGroupCluster;
use Faker\Generator as Faker;

$factory->define(StockGroupCluster::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'stock_group_cluster_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
