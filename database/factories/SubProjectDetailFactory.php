<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubProjectDetail;
use Faker\Generator as Faker;

$factory->define(SubProjectDetail::class, function (Faker $faker) {

    return [
        'actor_id' => $faker->word,
        'supervising_consultant_id' => $faker->word,
        'phase_id' => $faker->word,
        'start_date' => $faker->word,
        'end_date' => $faker->word,
        'contractor_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
