<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProjectSectors;
use Faker\Generator as Faker;

$factory->define(ProjectSectors::class, function (Faker $faker) {

    return [
        'sector_id' => $faker->word,
        'project_id' => $faker->word,
        'percent' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
