<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectStatusesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DistrictsWithGeomTableSeeder::class);
        $this->call(RegionsWithGeomTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PhasesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(SubProjectTypesTableSeeder::class);
        $this->call(SubProjectStatusesTableSeeder::class);
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
        $this->call(ProcuringEntityContractTableSeeder::class);
        $this->call(ProjectRegionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ProcuringEntityContractSupervisingConsultantsTableSeeder::class);
        $this->call(ProcuredProjectComponentsTableSeeder::class);
        $this->call(ProcuredProjectSubComponentsTableSeeder::class);

        if (App::environment('testing')) {
            $this->call(ProcuringEntityPackagesTableSeeder::class);
            $this->call(SubProjectsTableSeeder::class);
            $this->call(SafeguardConcernsTableSeeder::class);
            $this->call(ChallengesTableSeeder::class);
    }

    }
}
