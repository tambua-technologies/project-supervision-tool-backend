<?php

use App\Models\EnvironmentalCategory;
use Illuminate\Database\Seeder;

class EnvironmentalCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(EnvironmentalCategory::class, 5)->create();
    }
}
