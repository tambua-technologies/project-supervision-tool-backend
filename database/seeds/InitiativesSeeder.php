<?php

use App\Models\ActorType;
use App\Models\FundingOrganisation;
use App\Models\ImplementingPartner;
use App\Models\Initiative;
use App\Models\InitiativeType;
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
        factory(ActorType::class, 2)->create();
        factory(InitiativeType::class, 2)->create();
        factory(ImplementingPartner::class, 2)->create();
        factory(FundingOrganisation::class, 3)->create();
        factory(Initiative::class, 3)->create();

        $implementingPartners = ImplementingPartner::all();
        Initiative::all()->each(function ($initiative) use ($implementingPartners) {
            $initiative->implementing_partners()->attach(
                $implementingPartners->random(rand(1, 2))->pluck('id')->toArray()
            );
        });

        $fundingOrganisations = FundingOrganisation::all();
        Initiative::all()->each(function ($initiative) use ($fundingOrganisations) {
            $initiative->funding_organisations()->attach(
                $fundingOrganisations->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
