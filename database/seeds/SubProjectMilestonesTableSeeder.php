<?php

use Illuminate\Database\Seeder;

class SubProjectMilestonesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_project_milestones')->delete();

        \DB::table('sub_project_milestones')->insert(array (
            0 =>
            array (
                'name' => 'Clearing and grubbing',
                'is_measurable' => true,
                'quantity' => '{"unit": "m", "amount": 2920}',
                'description' => NULL,
                'sub_project_id' => 1,
                'created_at' => '2021-08-15 10:08:15',
                'updated_at' => '2021-08-15 10:08:15',
                'deleted_at' => NULL,
            ),
        ));


    }
}
