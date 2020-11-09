<?php

/** @var Factory $factory */

use App\Models\CoordinatingAgency;
use App\Models\FocalPerson;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CoordinatingAgency::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return factory(FocalPerson::class)->create()->id;
        },
    ];
});
