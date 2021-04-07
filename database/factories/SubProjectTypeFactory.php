<?php

/** @var Factory $factory */

use App\Models\SubProjectType;
use App\Models\Unit;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SubProjectType::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'unit_id' => function () {
            return Unit::query()->inRandomOrder()->first()->id;
        },
    ];
});
