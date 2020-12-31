<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Progress;
use App\Models\Project;
use App\Models\SubProject;
use Faker\Generator as Faker;

$factory->define(SubProject::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
        'progress_id' => function () {
            return Progress::query()->inRandomOrder()->first()->id;
        },
    ];
});
