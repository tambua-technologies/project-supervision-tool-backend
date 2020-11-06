<?php

use App\Models\ImplementingAgency;
use Illuminate\Database\Seeder;

class ImplementingAgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ImplementingAgency::class, 3)->create();
    }
}
