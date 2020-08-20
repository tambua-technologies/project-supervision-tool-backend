<?php

use App\Models\HRType;
use App\Models\HumanResource;
use App\Models\ImplementingPartner;
use App\Models\Initiative;
use App\Models\Type;
use Illuminate\Database\Seeder;

class InitiativesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type::class, 10)->create();
        factory(ImplementingPartner::class, 5)->create();
        factory(Initiative::class, 10)->create();

        $implementingPartners = ImplementingPartner::all();
        Initiative::all()->each(function ($initiative) use ($implementingPartners) {
            $initiative->implementing_partners()->attach(
                $implementingPartners->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
