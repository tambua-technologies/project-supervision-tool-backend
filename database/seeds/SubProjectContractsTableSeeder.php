<?php

use App\Models\SubProjectContract;
use Illuminate\Database\Seeder;

class SubProjectContractsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(SubProjectContract::class, 60)->create();
    }
}
