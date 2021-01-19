<?php

/** @var Factory $factory */

use App\Models\Actor;
use App\Models\Borrower;
use App\Models\FocalPerson;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Borrower::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
    ];
});
