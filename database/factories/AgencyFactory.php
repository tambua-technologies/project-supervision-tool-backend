<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agency;
use App\Models\AgencyType;
use App\Models\FocalPerson;
use Faker\Generator as Faker;

$factory->define(Agency::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
        'agency_type_id' => function () {
            return AgencyType::query()->inRandomOrder()->first()->id;
        },
    ];
});
