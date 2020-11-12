<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\Models\SubProject;
use Faker\Generator as Faker;

$factory->define(SubProject::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->word,
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
    ];
});
