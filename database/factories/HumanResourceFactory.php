<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HumanResource;
use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(HumanResource::class, function (Faker $faker) {

    return [
        'position_id' => function () {
            return Position::query()->inRandomOrder()->first()->id;
        },
        'quantity' => $faker->randomDigitNotNull
    ];
});
