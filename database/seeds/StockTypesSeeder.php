<?php

use App\Models\StockType;
use Illuminate\Database\Seeder;

class StockTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StockType::class, 3)->create();
    }
}
