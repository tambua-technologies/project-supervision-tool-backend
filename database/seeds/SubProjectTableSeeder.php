<?php

use App\Models\SubProject;
use Illuminate\Database\Seeder;

class SubProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubProject::class, 3)->create();
    }
}
