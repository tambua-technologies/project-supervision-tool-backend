<?php

use Illuminate\Database\Seeder;

class ProcuringEntityContractTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('procuring_entity_contract')->delete();
        
        \DB::table('procuring_entity_contract')->insert(array (
            0 => 
            array (
                'id' => 1,
                'procuring_entity_id' => 1,
                'name' => 'Construction Supervision of Infrastructure Components in
Temeke Municipality Under the Dar es Salaam Metropolitan
Development Project (DMDP)',
                'contract_no' => 'LGA/016/2014-2015/C/DMDP/01',
                'original_contract_sum' => '{"amount": 4265400, "currency": "USD"}',
                'revised_contract_sum' => '{"amount": 4265400, "currency": "USD"}',
                'original_signing_date' => '2016-04-18',
                'revised_signing_date' => NULL,
                'commencement_date' => '2016-06-01',
            'consortium_name' => 'M/s Kyong Dong Engineering Co. Ltd (KDEC), Korea JV
CORE Consulting Engineers Plc. (CORE). Ethiopia in
association with LUPTAN Consults Limited (LUPTAN),
Tanzania and MHANDISI Consultant Limited (MHANDISI),
Tanzania',
                'consultant_role_description' => NULL,
                'organisation_chart_url' => NULL,
                'revised_end_date_of_contract' => NULL,
                'end_date_of_contract' => '2022-06-30',
                'created_at' => '2022-07-12 18:31:56',
                'updated_at' => '2022-07-12 18:31:56',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'procuring_entity_id' => 2,
            'name' => 'Construction Supervision of Infrastructure Components in Kinondoni Municipality under the Dar es Salaam Metropolitan Development Project (DMDP)',
                'contract_no' => NULL,
                'original_contract_sum' => '{"amount": 4876580, "currency": "EURO"}',
                'revised_contract_sum' => '{"amount": 4876580, "currency": "EURO"}',
                'original_signing_date' => '2016-04-20',
                'revised_signing_date' => NULL,
                'commencement_date' => '2016-06-01',
            'consortium_name' => 'H. P. Gauff Ingenieure GmbH & Co. KG -JBG-,In association with NIMETA Consult (T) Ltd.',
                'consultant_role_description' => NULL,
                'organisation_chart_url' => NULL,
                'revised_end_date_of_contract' => NULL,
                'end_date_of_contract' => '2022-06-30',
                'created_at' => '2022-07-12 18:31:56',
                'updated_at' => '2022-07-12 18:31:56',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'procuring_entity_id' => 3,
            'name' => 'The provision of consultancy services for construction supervision of infrastructure components in ilala municipality under the dar es salaam metropolitan development project (dmdp)',
                'contract_no' => 'LGA/015/2014/2015/C/01',
                'original_contract_sum' => '{"amount": 3990682, "currency": "USD"}',
                'revised_contract_sum' => '{"amount": 3990682, "currency": "USD"}',
                'original_signing_date' => '2016-04-21',
                'revised_signing_date' => NULL,
                'commencement_date' => '2016-06-01',
                'consortium_name' => 'UWP CONSULTING SA, UWP TANZANIA and JMK INTERNATIONAL in Joint Venture',
                'consultant_role_description' => NULL,
                'organisation_chart_url' => NULL,
                'revised_end_date_of_contract' => NULL,
                'end_date_of_contract' => '2022-02-28',
                'created_at' => '2022-07-12 18:31:56',
                'updated_at' => '2022-07-12 18:31:56',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}