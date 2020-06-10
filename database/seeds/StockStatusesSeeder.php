<?php

use App\Models\StockStatuses;
use Illuminate\Database\Seeder;

class StockStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StockStatuses::class, 3)->create();
    }
}
