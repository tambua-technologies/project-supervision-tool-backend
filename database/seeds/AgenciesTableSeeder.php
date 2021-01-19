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
                'id' => 7,
                'name' => 'Ministry of Finance',
                'website' => 'yost.com',
                'focal_person_id' => 7,
                'location_id' => NULL,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:25:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Ministry of Education',
                'website' => 'collier.com',
                'focal_person_id' => 8,
                'location_id' => NULL,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:27:37',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'Ministry of Health',
                'website' => 'bailey.net',
                'focal_person_id' => 9,
                'location_id' => NULL,
                'type' => 'borrower',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:28:28',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 10,
            'name' => 'Regional Administration and Local Government (PMO-RALG)',
                'website' => 'maggio.net',
                'focal_person_id' => 10,
                'location_id' => NULL,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:30:54',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'kihn',
                'website' => 'mertz.info',
                'focal_person_id' => 11,
                'location_id' => NULL,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:31:41',
                'deleted_at' => '2021-01-19 05:31:41',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'reichel',
                'website' => 'hudson.biz',
                'focal_person_id' => 12,
                'location_id' => NULL,
                'type' => 'implementing_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:31:49',
                'deleted_at' => '2021-01-19 05:31:49',
            ),
            6 => 
            array (
                'id' => 4,
                'name' => 'WorldBank',
                'website' => 'klein.com',
                'focal_person_id' => 4,
                'location_id' => NULL,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:33:30',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 5,
                'name' => 'DFID Tanzania',
                'website' => 'dfid.com',
                'focal_person_id' => 5,
                'location_id' => NULL,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:35:19',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 6,
                'name' => 'abbott',
                'website' => 'pagac.info',
                'focal_person_id' => 6,
                'location_id' => NULL,
                'type' => 'funding_organisation',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 05:35:41',
                'deleted_at' => '2021-01-19 05:35:41',
            ),
            9 => 
            array (
                'id' => 1,
                'name' => 'Ilala Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 1,
                'location_id' => NULL,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:02',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 2,
                'name' => 'Temeke Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 2,
                'location_id' => NULL,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:27',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 3,
                'name' => 'Dodoma Municipal',
                'website' => 'lehner.org',
                'focal_person_id' => 3,
                'location_id' => NULL,
                'type' => 'actor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:35:59',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'LUCENT MANAGEMENT CONSULTANTS',
                'website' => 'farrell.biz',
                'focal_person_id' => 13,
                'location_id' => NULL,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:36:12',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'NICE Tanzania Management and Cooperate Consultant',
                'website' => 'lynch.org',
                'focal_person_id' => 15,
                'location_id' => NULL,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:37:19',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 14,
                'name' => 'MTL Consulting Company Limited',
                'website' => 'quitzon.com',
                'focal_person_id' => 14,
                'location_id' => NULL,
                'type' => 'supervising_agency',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:39:54',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'HAINAN INTERNATIONAL JOINT VENTURE',
                'website' => 'www.com',
                'focal_person_id' => 16,
                'location_id' => NULL,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:44:40',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'GROUP SIX INTERNATIONAL CO. LTD',
                'website' => 'www.com',
                'focal_person_id' => 17,
                'location_id' => NULL,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:45:58',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'NYANZA ROAD WORKS LTD',
                'website' => 'www.com',
                'focal_person_id' => 18,
                'location_id' => NULL,
                'type' => 'contractor',
                'created_at' => '2021-01-17 10:23:34',
                'updated_at' => '2021-01-19 06:48:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}