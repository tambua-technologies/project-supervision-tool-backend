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
        $this->call(DistrictsWithGeomTableSeeder::class);
        $this->call(RegionsWithGeomTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PhasesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(EnvironmentalCategoriesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(SectorsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(AgenciesTableSeeder::class);


        // tobe commented later before demo
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectLocationsTableSeeder::class);
        $this->call(SubProjectTableSeeder::class);
        $this->call(SubProjectLocationsSeeder::class);
        $this->call(SubProjectItemLocationSeeder::class);
        $this->call(SubProjectContractsTableSeeder::class);
        $this->call(SubProjectEquipmentsTableSeeder::class);
        $this->call(SubProjectItemsTableSeeder::class);
        $this->call(SubProjectMilestonesTableSeeder::class);
        $this->call(ProgressTableSeeder::class);



    }
}
