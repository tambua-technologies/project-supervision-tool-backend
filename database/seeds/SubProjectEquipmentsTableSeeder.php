<?php

use App\Models\SubProjectEquipment;
use Illuminate\Database\Seeder;

class SubProjectEquipmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(SubProjectEquipment::class, 60)->create();
    }
}
