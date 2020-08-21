<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\District;
use App\Models\Location;
use App\Models\Region;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    $regionId = Region::query()->inRandomOrder()->first()->id;
    $districtId = District::query()->where('region_id', $regionId)->first()->id;

    return [
        'level' => 'district',
        'region_id' => $regionId,
        'district_id' => $districtId,
    ];
});
