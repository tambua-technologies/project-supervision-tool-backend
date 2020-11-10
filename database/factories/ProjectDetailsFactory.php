<?php

/** @var Factory $factory */

use App\Models\Borrower;
use App\Models\CoordinatingAgency;
use App\Models\EnvironmentalCategory;
use App\Models\FundingOrganisation;
use App\Models\ImplementingAgency;
use App\Models\Location;
use App\Models\Money;
use App\Models\Project;
use App\Models\ProjectDetails;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProjectDetails::class, function (Faker $faker) {

    return [
        'project_id' =>function () {
            return factory(Project::class)->create()->id;
        },
        'country_id' => function () {
            return factory(Location::class)->create()->id;
        },
        'commitment_amount_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'total_project_cost_id' => function () {
            return factory(Money::class)->create()->id;
        },
        'status' => $faker->boolean($chanceOfGettingTrue = 50),
        'borrower_id' => function () {
            return Borrower::query()->inRandomOrder()->first()->id;
        },
        'implementing_agency_id' => function () {
            return ImplementingAgency::query()->inRandomOrder()->first()->id;
        },
        'funding_organisation_id' => function () {
            return FundingOrganisation::query()->inRandomOrder()->first()->id;
        },
        'coordinating_agency_id' => function () {
            return CoordinatingAgency::query()->inRandomOrder()->first()->id;
        },
        'environmental_category_id' => function () {
            return EnvironmentalCategory::query()->inRandomOrder()->first()->id;
        },
        'project_region' => 'Africa East',
        'approval_date' => $faker->dateTime,
        'approval_fy' => $faker->year,
        'closing_date' => $faker->dateTime,
    ];
});
