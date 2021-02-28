<?php

/** @var Factory $factory */

use App\Models\Progress;
use App\Models\Project;
use App\Models\SubProject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


$factory->define(SubProject::class, function (Faker $faker) {

    $string = $faker->sentence;
    $abbreviation = "";
    $string = ucwords($string);
    $words = explode(" ", "$string");
    foreach($words as $word){
        $abbreviation .= $word[0];
    }

    return [
        'name' => $string,
        'code' => $abbreviation,
        'description' => $faker->text,
        'project_id' => function () {
            return Project::query()->inRandomOrder()->first()->id;
        },
        'progress_id' => function () {
            return Progress::query()->inRandomOrder()->first()->id;
        },
    ];
});
