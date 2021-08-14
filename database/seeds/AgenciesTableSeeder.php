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
                'name' => 'Ministry of Education',
                'website' => 'collier.com',
                'focal_person_id' => 2,
                'type' => 'borrower',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Ministry of Health',
                'website' => 'bailey.net',
                'focal_person_id' => 3,
                'type' => 'borrower',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Regional Administration and Local Government (PMO-RALG)',
                'website' => 'maggio.net',
                'focal_person_id' => 1,
                'type' => 'implementing_agency',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'name' => 'WorldBank',
                'website' => 'klein.com',
                'focal_person_id' => 1,
                'type' => 'funding_organisation',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'name' => 'DFID Tanzania',
                'website' => 'dfid.com',
                'focal_person_id' => 2,
                'type' => 'funding_organisation',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'name' => 'LUCENT MANAGEMENT CONSULTANTS',
                'website' => 'farrell.biz',
                'focal_person_id' => 3,
                'type' => 'supervising_agency',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'name' => 'NICE Tanzania Management and Cooperate Consultant',
                'website' => 'lynch.org',
                'focal_person_id' => 1,
                'type' => 'supervising_agency',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'name' => 'NICE Tanzania Management and Cooperate Consultant',
                'website' => 'lynch.org',
                'focal_person_id' => 1,
                'type' => 'supervising_agency',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'name' => 'MTL Consulting Company Limited',
                'website' => 'quitzon.com',
                'focal_person_id' => 1,
                'type' => 'supervising_agency',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'name' => 'GROUP SIX INTERNATIONAL CO. LTD',
                'website' => 'www.com',
                'focal_person_id' => 2,
                'type' => 'contractor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'name' => 'Kinondoni',
                'website' => 'lehner.org',
                'focal_person_id' => 3,
                'type' => 'actor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'name' => 'Ilala',
                'website' => 'lehner.org',
                'focal_person_id' => 1,
                'type' => 'actor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'name' => 'Temeke',
                'website' => 'lehner.org',
                'focal_person_id' => 3,
                'type' => 'actor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'name' => 'China Railway Seventh Group Co. Ltd',
                'website' => 'www.com',
                'focal_person_id' => 3,
                'type' => 'contractor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
