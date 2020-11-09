<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Money;
use Faker\Generator as Faker;

$factory->define(Money::class, function (Faker $faker) {

    return [
        'amount' => $faker->word,
        'currency_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
