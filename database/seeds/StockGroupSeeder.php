<?php

use App\Models\StockGroup;
use Illuminate\Database\Seeder;

class StockGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StockGroup::class,3)->create();
    }
}
