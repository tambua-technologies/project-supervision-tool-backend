<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FocalPerson;
use App\Models\ImplementingAgency;
use Faker\Generator as Faker;

$factory->define(ImplementingAgency::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
    ];
});


