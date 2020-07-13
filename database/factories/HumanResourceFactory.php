<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HRType;
use App\Models\HumanResource;
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(HumanResource::class, function (Faker $faker) {

    return [
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'end_date' => $faker->date('Y-m-d H:i:s'),
        'quantity' => $faker->randomDigitNotNull,
        'description' => $faker->word,
        'hr_type_id' => function () {
            return HRType::query()->inRandomOrder()->first()->id;
        },
        'location_id' => function () {
            return Location::query()->inRandomOrder()->first()->id;
        },
    ];
});
