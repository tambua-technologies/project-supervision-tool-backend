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
        $this->call(PhasesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(ProgressTableSeeder::class);
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
        $this->call(ContractorsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SubProjectTableSeeder::class);
        $this->call(ProjectThemesTableSeeder::class);
        $this->call(ProjectSectorsTableSeeder::class);
        $this->call(SubProjectDetailsTableSeeder::class);
        $this->call(SubProjectItemsTableSeeder::class);
        $this->call(SubProjectEquipmentsTableSeeder::class);
        $this->call(HumanResourcesTableSeeder::class);
    }
}
