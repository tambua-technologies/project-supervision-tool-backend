<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'capacity' => $faker->word,
        'unit_id' => function () {
            return Unit::query()->inRandomOrder()->first()->id;
        },
    ];
});
