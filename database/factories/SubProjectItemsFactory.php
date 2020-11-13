<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\SubProject;
use App\Models\SubProjectItems;
use Faker\Generator as Faker;

$factory->define(SubProjectItems::class, function (Faker $faker) {

    return [
        'quantity' => $faker->randomDigit,
        'item_id' => function () {
            return Item::query()->inRandomOrder()->first()->id;
        },
        'sub_project_id' => function () {
            return SubProject::query()->inRandomOrder()->first()->id;
        },
    ];
});
