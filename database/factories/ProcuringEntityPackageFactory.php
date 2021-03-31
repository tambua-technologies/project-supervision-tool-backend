<?php

/** @var Factory $factory */

use App\Models\ProcuringEntity;
use App\Models\ProcuringEntityPackage;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProcuringEntityPackage::class, function (Faker $faker) {

    return [

        'name' => $faker->word,
        'description' => $faker->text,
        'procuring_entity_id' => function () {
            return ProcuringEntity::query()->inRandomOrder()->first()->id;
        },
    ];
});
