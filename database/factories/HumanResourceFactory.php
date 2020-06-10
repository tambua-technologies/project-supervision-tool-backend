<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HumanResource;
use Faker\Generator as Faker;

$factory->define(HumanResource::class, function (Faker $faker) {

    return [
        'start_date' => $faker->word,
        'end_date' => $faker->word,
        'quantity' => $faker->randomDigitNotNull,
        'meta' => $faker->word,
        'location_id' => $faker->word,
        'item_id' => $faker->word,
        'agency_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
