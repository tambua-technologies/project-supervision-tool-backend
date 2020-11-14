<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContractTime;
use Faker\Generator as Faker;

$factory->define(ContractTime::class, function (Faker $faker) {

    return [
        'start_date' => $faker->date('Y-m-d H:i:s'),
        'original_contract_period' => $faker->randomDigit,
        'defects_liability_period' => $faker->randomDigit,
        'time_extension_granted' => $faker->randomDigit,
        'time_extension_applied_not_yet_granted' => $faker->randomDigit,
        'intended_completion_date' => $faker->date('Y-m-d H:i:s'),
        'revised_completion_date' => $faker->date('Y-m-d H:i:s'),
        'time_percentage_lapsed_to_date' => $faker->randomDigitNotNull
    ];
});
