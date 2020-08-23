<?php

/** @var Factory $factory */

use App\Models\ActorType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ActorType::class, function (Faker $faker) {

    return [
        'name' => $faker->domainWord,
        'description' => $faker->text,
    ];
});
