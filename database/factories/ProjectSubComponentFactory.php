<?php

/** @var Factory $factory */

use App\Models\Project;
use App\Models\ProjectComponent;
use App\Models\ProjectSubComponent;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectSubComponent::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'project_component_id' => function () {
            return ProjectComponent::query()->inRandomOrder()->first()->id;
        },
    ];
});
