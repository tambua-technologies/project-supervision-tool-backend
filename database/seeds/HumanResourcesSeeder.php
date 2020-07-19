<?php

use App\Models\HRType;
use App\Models\HumanResource;
use App\Models\ImplementingPartner;
use App\Models\Item;
use Illuminate\Database\Seeder;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HRType::class, 10)->create();
        factory(ImplementingPartner::class, 5)->create();
        factory(HumanResource::class, 10)->create();

        $implementingPartners = ImplementingPartner::all();

        HumanResource::all()->each(function ($humanResource) use ($implementingPartners) {
            $humanResource->implementing_partners()->attach(
                $implementingPartners->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
