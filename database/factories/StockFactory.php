<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {

    return [
        'start_date' => $faker->word,
        'end_date' => $faker->word,
        'quantity' => $faker->randomDigitNotNull,
        'pace_of_production' => $faker->randomDigitNotNull,
        'frequency' => $faker->randomDigitNotNull,
        'meta' => $faker->word,
        'stock_status_id' => $faker->word,
        'stock_type_id' => $faker->word,
        'stock_group_cluster_id' => $faker->word,
        'location_id' => $faker->word,
        'item_id' => $faker->word,
        'agency_id' => $faker->word,
        'emergency_response_theme_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
