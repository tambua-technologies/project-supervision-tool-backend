<?php

/** @var Factory $factory */

use App\Models\Project;
use App\Models\ProjectComponent;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectComponent::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
    ];
});
