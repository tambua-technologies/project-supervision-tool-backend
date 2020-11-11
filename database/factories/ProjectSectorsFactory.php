<?php

/** @var Factory $factory */

use App\Models\Project;
use App\Models\ProjectSectors;
use App\Models\Sector;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectSectors::class, function (Faker $faker) {

    return [
        'sector_id' => function () {
            return Sector::query()->inRandomOrder()->first()->id;
        },
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
        'percent' => $faker->randomDigitNotNull,
    ];
});
