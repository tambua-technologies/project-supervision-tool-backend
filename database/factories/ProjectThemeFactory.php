<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProjectTheme;
use Faker\Generator as Faker;

$factory->define(ProjectTheme::class, function (Faker $faker) {

    return [
        'project_id' => $faker->word,
        'theme_id' => $faker->word,
        'percent' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
