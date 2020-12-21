<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContractCost;
use App\Models\Contractor;
use App\Models\ContractTime;
use App\Models\SubProject;
use App\Models\SubProjectContract;
use Faker\Generator as Faker;

$factory->define(SubProjectContract::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence,
        'sub_project_id' => function () {
        return SubProject::query()->inRandomOrder()->first()->id;
    },
        'contract_cost_id' => function () {
            return factory(ContractCost::class)->create()->id;
        },
        'contract_time_id' => function () {
            return factory(ContractTime::class)->create()->id;
        },
        'contractor_id' => function () {
            return Contractor::query()->inRandomOrder()->first()->id;
        },
    ];
});
