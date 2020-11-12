<?php

use App\Models\Contractor;
use Illuminate\Database\Seeder;

class ContractorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contractor::class, 3)->create();
    }
}
