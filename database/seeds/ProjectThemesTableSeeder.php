<?php

use App\Models\ProjectTheme;
use Illuminate\Database\Seeder;

class ProjectThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        factory(ProjectTheme::class, 3)->create();
    }
}
