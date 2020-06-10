<?php

use App\Models\StockGroupCluster;
use Illuminate\Database\Seeder;

class StockGroupClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StockGroupCluster::class, 4)->create();
    }
}
