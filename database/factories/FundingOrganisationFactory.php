<?php

/** @var Factory $factory */

use App\Models\FocalPerson;
use App\Models\FundingOrganisation;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(FundingOrganisation::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
    ];
});
