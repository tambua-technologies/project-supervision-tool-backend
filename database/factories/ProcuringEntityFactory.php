<?php

/** @var Factory $factory */

use App\Models\Agency;
use App\Models\ProcuringEntity;
use App\Models\ProjectSubComponent;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProcuringEntity::class, function (Faker $faker) {

    return [
        'agency_id' => function () {
            return Agency::query()->inRandomOrder()->first()->id;
        },
        'project_sub_component_id' => function () {
            return ProjectSubComponent::query()->inRandomOrder()->first()->id;
        },
    ];
});
