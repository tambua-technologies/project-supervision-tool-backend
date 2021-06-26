<?php

use Illuminate\Database\Seeder;

class SubProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_projects')->delete();
        
        \DB::table('sub_projects')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'MMK',
                'code' => 'M',
                'description' => 'MMK',
                'physical_progress' => '20',
                'financial_progress' => '50',
                'quantity' => '14',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 2,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Nzasa',
                'code' => 'N',
                'description' => 'Nzasa',
                'physical_progress' => '40',
                'financial_progress' => '20',
                'quantity' => '30',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 1,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'Omary Londo',
                'code' => 'ON',
                'description' => 'Omary Londo',
                'physical_progress' => '80',
                'financial_progress' => '100',
                'quantity' => '10',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 8,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 1,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 2,
                'name' => 'Tanesco-Soko la Samaki',
                'code' => 'TSLS',
                'description' => 'Tanesco-Soko la Samaki',
                'physical_progress' => '30',
                'financial_progress' => '39',
                'quantity' => '50',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 2,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Viwandani',
                'code' => 'V',
                'description' => 'Viwandani',
                'physical_progress' => '10',
                'financial_progress' => '40',
                'quantity' => '19',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 3,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Makanya',
                'code' => 'M',
                'description' => 'Makanya',
                'physical_progress' => '15',
                'financial_progress' => '60',
                'quantity' => '30',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 2,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 2,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Buguruni-Kisiwani-Tenge-Liwiti',
                'code' => 'BITL',
                'description' => 'Buguruni-Kisiwani-Tenge-Liwiti',
                'physical_progress' => '34',
                'financial_progress' => '40',
                'quantity' => '10',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 12,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 1,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1,
                'name' => 'Sokoni Makumbusho',
                'code' => 'SM',
                'description' => 'Sokoni Makumbusho',
                'physical_progress' => '50',
                'financial_progress' => '90',
                'quantity' => '10',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 1,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 1,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 7,
                'name' => 'Korogwe-Kilungule-Majichumvi',
                'code' => 'KKM',
                'description' => 'Korogwe-Kilungule-Majichumvi',
                'physical_progress' => '65',
                'financial_progress' => '70',
                'quantity' => '30',
                'geo_json' => NULL,
                'procuring_entity_package_id' => 3,
                'procuring_entity_id' => NULL,
                'sub_project_type_id' => 1,
                'contract_id' => NULL,
                'project_id' => 1,
                'sub_project_status_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}