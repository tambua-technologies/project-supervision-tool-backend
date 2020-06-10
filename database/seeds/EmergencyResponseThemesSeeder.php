<?php

use Illuminate\Database\Seeder;

class EmergencyResponseThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EmergencyResponseTheme::class, 5)->create();
    }
}
