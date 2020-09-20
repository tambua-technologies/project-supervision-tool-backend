<?php

use App\Models\AgencyType;
use Illuminate\Database\Seeder;

class AgencyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AgencyType::class, 2)->create();
    }
}
