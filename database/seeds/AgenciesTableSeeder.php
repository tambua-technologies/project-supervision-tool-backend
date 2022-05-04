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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => null,
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
                'district_id' => 'TZ0701',
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
                'district_id' => 'TZ0702',
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
                'district_id' => 'TZ0703',
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
                'district_id' => null,
                'website' => 'www.com',
                'focal_person_id' => 3,
                'type' => 'contractor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 =>
                array (
                    'name' => 'China Civil Engineering Construction Corporation (CCECC)',
                    'district_id' => null,
                    'website' => 'farrell.biz',
                    'focal_person_id' => 3,
                    'type' => 'supervising_agency',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            15 =>
                array (
                    'name' => 'China Henan International Cooperation Group Co. LTD',
                    'district_id' => null,
                    'website' => 'farrell.biz',
                    'focal_person_id' => 3,
                    'type' => 'supervising_agency',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
        ));


    }
}
