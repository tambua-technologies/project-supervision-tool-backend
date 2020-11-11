<?php

/** @var Factory $factory */

use App\Models\Project;
use App\Models\ProjectTheme;
use App\Models\Theme;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectTheme::class, function (Faker $faker) {

    return [
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
        'theme_id' => function () {
            return Theme::query()->inRandomOrder()->first()->id;
        },
        'percent' => $faker->randomDigitNotNull,
    ];
});
