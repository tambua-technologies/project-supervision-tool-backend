<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actor;
use App\Models\FocalPerson;
use Faker\Generator as Faker;

$factory->define(Actor::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
    ];
});
