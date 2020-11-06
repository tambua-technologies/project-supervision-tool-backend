<?php

use App\Models\FundingOrganisation;
use Illuminate\Database\Seeder;

class FundingOrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FundingOrganisation::class, 3)->create();
    }
}
