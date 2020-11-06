<?php

use App\Models\SupervisingAgency;
use Illuminate\Database\Seeder;

class SupervisingAgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SupervisingAgency::class, 3)->create();
    }
}
