<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use App\Models\Location;
use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    $regionId = Region::query()->inRandomOrder()->first()->id;
    $districtIds = District::query()->where('region_id', $regionId)->get()->pluck(['id']);
    $levels = ['district', 'region'];

    return [
        'level' => $levels[array_rand($levels)],
        'region_id' => $regionId,
        'district_id' => $districtIds->random(),
    ];
});
