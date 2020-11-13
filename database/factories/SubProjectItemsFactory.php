<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubProjectItems;
use Faker\Generator as Faker;

$factory->define(SubProjectItems::class, function (Faker $faker) {

    return [
        'quantity' => $faker->word,
        'item_id' => $faker->word,
        'sub_project_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
