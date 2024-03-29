<?php

/** @var Factory $factory */

use App\Models\Project;
use App\Models\ProjectStatus;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


$factory->define(Project::class, function (Faker $faker) {

    $string = $faker->sentence;
    $abbreviation = "";
    $string = ucwords($string);
    $words = explode(" ", "$string");
    foreach($words as $word){
        $abbreviation .= $word[0];
    }

    return [
        'id' => $faker->unique()->userName,
        'name' => $string,
        'code' => $abbreviation,
        'description' => $faker->text,
        'project_status_id' => function () {
            return ProjectStatus::query()->inRandomOrder()->first()->id;
        },
    ];
});
