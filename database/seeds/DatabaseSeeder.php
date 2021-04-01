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
        $this->call(MoneyTableSeeder::class);
        $this->call(SectorsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(AgenciesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectComponentsTableSeeder::class);
        $this->call(ProjectSubComponentsTableSeeder::class);
        $this->call(ProcuringEntitiesTableSeeder::class);
        $this->call(ProcuringEntityPackagesTableSeeder::class);
        $this->call(SubProjectsTableSeeder::class);
        $this->call(ProjectDetailsTableSeeder::class);
        $this->call(ProjectRegionsTableSeeder::class);
//        $this->call(ProjectLocationsTableSeeder::class);
//        $this->call(SubProjectLocationsSeeder::class);
//        $this->call(SubProjectItemLocationSeeder::class);
//        $this->call(SubProjectContractsTableSeeder::class);
//        $this->call(SubProjectEquipmentsTableSeeder::class);
//        $this->call(SubProjectItemsTableSeeder::class);
//        $this->call(SubProjectMilestonesTableSeeder::class);
//        $this->call(ProgressTableSeeder::class);
    }
}
