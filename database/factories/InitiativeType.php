<?php

/** @var Factory $factory */

use App\Models\ActorType;
use App\Models\InitiativeType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(InitiativeType::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'description' => $faker->text,
    ];
});
