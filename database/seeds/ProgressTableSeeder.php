<?php

use App\Models\Progress;
use Illuminate\Database\Seeder;

class ProgressTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(Progress::class, 3)->create();
    }
}
