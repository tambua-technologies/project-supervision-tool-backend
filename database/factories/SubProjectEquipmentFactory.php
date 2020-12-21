<?php

/** @var Factory $factory */

use App\Models\Item;
use App\Models\SubProject;
use App\Models\SubProjectEquipment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SubProjectEquipment::class, function (Faker $faker) {

    return [
        'item_id' => function () {
            return Item::query()->inRandomOrder()->first()->id;
        },
        'sub_project_id' => function () {
            return SubProject::query()->inRandomOrder()->first()->id;
        },
        'quantity_per_contract' => $faker->randomDigit,
        'quantity_mobilized' => $faker->randomDigit,
        'remarks' => $faker->sentence,
        'mobilization_date' => $faker->date('Y-m-d H:i:s')
    ];
});
