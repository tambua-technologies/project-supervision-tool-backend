<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FocalPerson;
use App\Models\SupervisingAgency;
use Faker\Generator as Faker;

$factory->define(SupervisingAgency::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'website' => $faker->domainName,
        'focal_person_id' => function () {
            return factory(FocalPerson::class)->create()->id;
        },
    ];
});
