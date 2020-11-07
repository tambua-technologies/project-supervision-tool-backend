<?php

use App\Models\CoordinatingAgency;
use Illuminate\Database\Seeder;

class CoordinatingAgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CoordinatingAgency::class, 3)->create();
    }
}
