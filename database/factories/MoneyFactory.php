<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Currency;
use App\Models\Money;
use Faker\Generator as Faker;

$factory->define(Money::class, function (Faker $faker) {

    return [
        'amount' => $faker->numberBetween($min = 100000, $max = 900000000),
        'currency_id' => function () {
            return Currency::query()->where('iso', 'USD')->first()->id;
        },
    ];
});
