<?php

use Illuminate\Database\Seeder;

class AgenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('agencies')->delete();

        \DB::table('agencies')->insert(array (
            0 =>
            array (
                'name' => 'Ministry of Finance',
                'website' => 'yost.com',
                'focal_person_id' => 1,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:25:32',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Ministry of Education',
                'website' => 'collier.com',
                'focal_person_id' => 2,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:27:37',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Ministry of Health',
                'website' => 'bailey.net',
                'focal_person_id' => 3,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:28:28',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
            'name' => 'Regional Administration and Local Government (PMO-RALG)',
                'website' => 'maggio.net',
                'focal_person_id' => 1,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:30:54',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'kihn',
                'website' => 'mertz.info',
                'focal_person_id' => 2,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:31:41',
                'deleted_at' => '2021-01-19 05:31:41',
            ),
            5 =>
            array (
                'name' => 'reichel',
                'website' => 'hudson.biz',
                'focal_person_id' => 3,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:31:49',
                'deleted_at' => '2021-01-19 05:31:49',
            ),
            6 =>
            array (
                'name' => 'WorldBank',
                'website' => 'klein.com',
                'focal_person_id' => 1,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:33:30',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'name' => 'DFID Tanzania',
                'website' => 'dfid.com',
                'focal_person_id' => 2,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:35:19',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'name' => 'abbott',
                'website' => 'pagac.info',
                'focal_person_id' => 3,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:35:41',
                'deleted_at' => '2021-01-19 05:35:41',
            ),
            9 =>
            array (
                'name' => 'Ilala Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 1,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:02',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'name' => 'Temeke Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 2,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:27',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'name' => 'Dodoma Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 3,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:59',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'name' => 'LUCENT MANAGEMENT CONSULTANTS',
                'website' => 'farrell.biz',
                'focal_person_id' => 3,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:36:12',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'name' => 'NICE Tanzania Management and Cooperate Consultant',
                'website' => 'lynch.org',
                'focal_person_id' => 1,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:37:19',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'name' => 'MTL Consulting Company Limited',
                'website' => 'quitzon.com',
                'focal_person_id' => 1,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:39:54',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'name' => 'HAINAN INTERNATIONAL JOINT VENTURE',
                'website' => 'www.com',
                'focal_person_id' => 3,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:44:40',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'name' => 'GROUP SIX INTERNATIONAL CO. LTD',
                'website' => 'www.com',
                'focal_person_id' => 2,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:45:58',
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'name' => 'NYANZA ROAD WORKS LTD',
                'website' => 'www.com',
                'focal_person_id' => 3,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:48:00',
                'deleted_at' => NULL,
            ),
        ));


    }
}
