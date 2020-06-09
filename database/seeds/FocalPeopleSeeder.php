<?php

use App\Models\FocalPerson;
use Illuminate\Database\Seeder;

class FocalPeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FocalPerson::class, 10)->create();
    }
}
