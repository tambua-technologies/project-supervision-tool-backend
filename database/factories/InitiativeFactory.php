<?php

/** @var Factory $factory */

use App\Models\ActorType;
use App\Models\FocalPerson;
use App\Models\Initiative;
use App\Models\InitiativeType;
use App\Models\Location;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Initiative::class, function (Faker $faker) {

    return [
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'end_date' => $faker->date('Y-m-d H:i:s'),
        'title' => $faker->word,
        'description' => $faker->word,
        'actor_type_id' => function () {
            return ActorType::query()->inRandomOrder()->first()->id;
        },
        'initiative_type_id' => function () {
            return InitiativeType::query()->inRandomOrder()->first()->id;
        },
        'focal_person_id' => function () {
            return FocalPerson::query()->inRandomOrder()->first()->id;
        },
        'location_id' => function () {
            return Location::query()->inRandomOrder()->first()->id;
        },
    ];
});
