<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FundingOrganisation;
use Faker\Generator as Faker;

$factory->define(FundingOrganisation::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'website' => $faker->word,
        'focal_person_id' => $faker->word,
        'type' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
