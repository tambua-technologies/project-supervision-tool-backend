<?php

use App\Models\SupervisingAgency;
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
        $this->call(LocationsSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(FundingOrganisationsTableSeeder::class);
        $this->call(ImplementingAgencyTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SubProjectTableSeeder::class);
        $this->call(SupervisingAgenciesTableSeeder::class);
    }
}
