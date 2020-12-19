<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actor;
use App\Models\Contractor;
use App\Models\Phase;
use App\Models\SubProject;
use App\Models\SubProjectDetail;
use App\Models\SupervisingAgency;
use Faker\Generator as Faker;

$factory->define(SubProjectDetail::class, function (Faker $faker) {

    return [
        'supervising_agency_id' => function () {
            return SupervisingAgency::query()->inRandomOrder()->first()->id;
        },
        'sub_project_id' => function () {
            return factory(SubProject::class)->create()->id;
        },
        'actor_id' => function () {
            return Actor::query()->inRandomOrder()->first()->id;
        },
        'phase_id' => function () {
            return Phase::query()->inRandomOrder()->first()->id;
        },
        'contractor_id' => function () {
            return Contractor::query()->inRandomOrder()->first()->id;
        },
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'end_date' => $faker->date('Y-m-d H:i:s'),
    ];
});
