<?php

use Illuminate\Database\Seeder;

class ProjectDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('project_details')->delete();

        \DB::table('project_details')->insert(array (
            0 =>
            array (
                'project_id' => 1,
                'borrower_id' => 3,
                'implementing_agency_id' => 4,
                'funding_organisation_id' => 8,
                'total_project_cost_id' => 2,
                'commitment_amount_id' => 1,
                'approval_date' => '2005-01-22 17:51:13',
                'approval_fy' => '1970-01-01',
                'project_region' => 'Africa East',
                'closing_date' => '2009-12-06 18:01:48',
                'environmental_category_id' => 1,
                'created_at' => '2021-04-01 07:00:22',
                'updated_at' => '2021-04-01 07:00:22',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'project_id' => 2,
                'borrower_id' => 2,
                'implementing_agency_id' => 3,
                'funding_organisation_id' => 4,
                'total_project_cost_id' => 1,
                'commitment_amount_id' => 2,
                'approval_date' => '2005-01-22 17:51:13',
                'approval_fy' => '1970-01-01',
                'project_region' => 'Africa East',
                'closing_date' => '2009-12-06 18:01:48',
                'environmental_category_id' => 1,
                'created_at' => '2021-04-01 07:00:22',
                'updated_at' => '2021-04-01 07:00:22',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'project_id' => 3,
                'borrower_id' => 1,
                'implementing_agency_id' => 2,
                'funding_organisation_id' => 3,
                'total_project_cost_id' => 3,
                'commitment_amount_id' => 2,
                'approval_date' => '2005-01-22 17:51:13',
                'approval_fy' => '1970-01-01',
                'project_region' => 'Africa East',
                'closing_date' => '2009-12-06 18:01:48',
                'environmental_category_id' => 1,
                'created_at' => '2021-04-01 07:00:22',
                'updated_at' => '2021-04-01 07:00:22',
                'deleted_at' => NULL,
            ),
        ));


    }
}
