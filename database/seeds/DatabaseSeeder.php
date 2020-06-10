<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(FocalPeopleSeeder::class);
         $this->call(AgencyTypesSeeder::class);
         $this->call(AgencySeeder::class);
         $this->call(UnitsSeeder::class);
         $this->call(ItemsSeeder::class);
         $this->call(LocationsSeeder::class);
         $this->call(StockTypesSeeder::class);
    }
}
