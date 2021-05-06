<?php

/** @var Factory $factory */

use App\Models\ContractCost;
use App\Models\Money;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ContractCost::class, function (Faker $faker) {

    return [
        'contract_award_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'certified_work_to_date_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'works_certified_to_date_percentage' => function () {
            return factory(Money::class)->create()->id;
        },
        'financial_penalties_applied_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'financial_penalties_granted_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'variations_granted_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'variations_applied_not_yet_granted_value_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'estimated_final_contract_price_id' => function () {
            return factory(Money::class)->create()->id;
        },
    ];
});
