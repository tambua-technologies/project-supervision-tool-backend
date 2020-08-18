<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use App\Models\Location;
use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {

    return [
        'level' => $faker->word,
        'region_id' => function () {
            return Region::query()->inRandomOrder()->first()->id;
        },
        'district_id' => function () {
            return District::query()->inRandomOrder()->first()->id;
        },
    ];
});
