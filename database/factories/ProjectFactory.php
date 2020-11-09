<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    return [
        'id' => $faker->unique()->userName,
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
