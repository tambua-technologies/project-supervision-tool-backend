<?php

/** @var Factory $factory */

use App\Models\ProjectDetails;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectDetails::class, function (Faker $faker) {

    return [
        'project_id' => $faker->word,
        'status' => $faker->word,
        'borrower' => $faker->word,
        'implementing_agency_id' => $faker->word,
        'funding_organisation_id' => $faker->word,
        'coordinating_agency_id' => $faker->word,
        'location_id' => $faker->word,
        'total_project_cost' => $faker->word,
        'approval_date' => $faker->word,
        'approval_fy' => $faker->word,
        'project_region' => $faker->word,
        'closing_date' => $faker->word,
        'environmental_category_id' => $faker->word,
        'commitment_amount' => $faker->word
    ];
});
