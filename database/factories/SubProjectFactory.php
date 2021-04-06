<?php

/** @var Factory $factory */

use App\Models\ProcuringEntityPackage;
use App\Models\SubProject;
use App\Models\SubProjectStatus;
use App\Models\SubProjectType;
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
        'quantity' => $faker->randomDigitNotNull,
        'procuring_entity_package_id' => function () {
            return ProcuringEntityPackage::query()->inRandomOrder()->first()->id;
        },
        'sub_project_type_id' => function () {
            return SubProjectType::query()->inRandomOrder()->first()->id;
        },
        'sub_project_status_id' => function () {
            return SubProjectStatus::query()->inRandomOrder()->first()->id;
        }
    ];
});
