<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubProject;
use App\Models\SubProjectMilestones;
use Faker\Generator as Faker;

$factory->define(SubProjectMilestones::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'sub_project_id' => function () {
            return SubProject::query()->inRandomOrder()->first()->id;
        },
    ];
});
