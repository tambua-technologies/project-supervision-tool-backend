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
        $this->call(CountriesTableSeeder::class);
        $this->call(EnvironmentalCategoriesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SectorsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(FundingOrganisationsTableSeeder::class);
        $this->call(BorrowerTableSeeder::class);
        $this->call(ImplementingAgencyTableSeeder::class);
        $this->call(SupervisingAgenciesTableSeeder::class);
        $this->call(CoordinatingAgenciesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SubProjectTableSeeder::class);
    }
}
