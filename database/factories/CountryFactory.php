<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {

    return [
        'id' => 'TZ',
        'name' => 'Tanzania',
    ];
});
