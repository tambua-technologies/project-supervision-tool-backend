<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AgencyType;
use Faker\Generator as Faker;

$factory->define(AgencyType::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'description' => $faker->text,
    ];
});
