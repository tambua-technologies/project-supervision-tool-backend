<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DistrictsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(FocalPeopleSeeder::class);
         $this->call(AgencyTypesSeeder::class);
         $this->call(AgencySeeder::class);
         $this->call(UnitsSeeder::class);
         $this->call(ItemsSeeder::class);
         $this->call(LocationsSeeder::class);
         $this->call(StockTypesSeeder::class);
         $this->call(StockStatusesSeeder::class);
         $this->call(StockGroupClusterSeeder::class);
         $this->call(StockGroupSeeder::class);
         $this->call(EmergencyResponseThemesSeeder::class);
         $this->call(HumanResourcesSeeder::class);
         $this->call(InitiativesSeeder::class);
//        \$this->call(ActorTypesTableSeeder::class);
//        \$this->call(InitiativeTypesTableSeeder::class);
//        \$this->call(FundingOrganisationsTableSeeder::class);

    }
}
