<?php

use App\Models\SubProject;
use App\Models\SubProjectDetail;
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
        factory(SubProjectDetail::class, 50)->create();
    }
}
