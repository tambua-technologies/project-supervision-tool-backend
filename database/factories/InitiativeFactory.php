<?php

/** @var Factory $factory */

use App\Models\Initiative;
use App\Models\Location;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Initiative::class, function (Faker $faker) {

    return [
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'end_date' => $faker->date('Y-m-d H:i:s'),
        'title' => $faker->word,
        'description' => $faker->word,
        'actor_type_id' => function () {
            return Type::query()->inRandomOrder()->first()->id;
        },
        'location_id' => function () {
            return Location::query()->inRandomOrder()->first()->id;
        },
    ];
});
