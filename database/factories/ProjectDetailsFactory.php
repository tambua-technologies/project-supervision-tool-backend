<?php

/** @var Factory $factory */

use App\Models\CoordinatingAgency;
use App\Models\FundingOrganisation;
use App\Models\ImplementingAgency;
use App\Models\Location;
use App\Models\Project;
use App\Models\ProjectDetails;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectDetails::class, function (Faker $faker) {

    return [
        'project_id' =>function () {
            return factory(Project::class)->create()->id;
        },
        'location_id' => function () {
            return factory(Location::class)->create()->id;
        },
        'status' => $faker->boolean,
        'borrower' => $faker->word,
        'implementing_agency_id' => function () {
            return ImplementingAgency::query()->inRandomOrder()->first()->id;
        },
        'funding_organisation_id' => function () {
            return FundingOrganisation::query()->inRandomOrder()->first()->id;
        },
        'coordinating_agency_id' => function () {
            return CoordinatingAgency::query()->inRandomOrder()->first()->id;
        },
        'approval_date' => $faker->dateTime,
        'approval_fy' => $faker->year,
        'closing_date' => $faker->dateTime,
    ];
});
