<?php

use Illuminate\Database\Seeder;

class ChallengesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('challenges')->delete();
        
        \DB::table('challenges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dead end road due to presence of obstruction',
                'way_forward' => 'CSC and client team has a joint visit to the site for discuss of the way forward.',
                'entity_id' => 1,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:18:08',
                'updated_at' => '2022-07-11 11:18:08',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Construction of Parking Lots at Detention Pond which is claimed be hazardous area and is under POLICE authority',
                'way_forward' => 'Agreement was done to base with the original designs without additional features such as recreational area, toilets, askari hut etc. Harmonization meeting to be done with Police Officers to discuss how to operate Parking since they discourage it for public use.',
                'entity_id' => 2,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:18:08',
                'updated_at' => '2022-07-11 11:18:08',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dead end road due to presence of obstruction',
                'way_forward' => 'CSC and client team has a joint visit to the site for discuss of the way forward.',
                'entity_id' => 1,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:19:08',
                'updated_at' => '2022-07-11 11:19:08',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Construction of Parking Lots at Detention Pond which is claimed be hazardous area and is under POLICE authority',
                'way_forward' => 'Agreement was done to base with the original designs without additional features such as recreational area, toilets, askari hut etc. Harmonization meeting to be done with Police Officers to discuss how to operate Parking since they discourage it for public use.',
                'entity_id' => 2,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:19:08',
                'updated_at' => '2022-07-11 11:19:08',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Dead end road due to presence of obstruction',
                'way_forward' => 'CSC and client team has a joint visit to the site for discuss of the way forward.',
                'entity_id' => 1,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:29:09',
                'updated_at' => '2022-07-11 11:29:09',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Construction of Parking Lots at Detention Pond which is claimed be hazardous area and is under POLICE authority',
                'way_forward' => 'Agreement was done to base with the original designs without additional features such as recreational area, toilets, askari hut etc. Harmonization meeting to be done with Police Officers to discuss how to operate Parking since they discourage it for public use.',
                'entity_id' => 2,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 11:29:09',
                'updated_at' => '2022-07-11 11:29:09',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Dead end road due to presence of obstruction',
                'way_forward' => 'CSC and client team has a joint visit to the site for discuss of the way forward.',
                'entity_id' => 1,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 13:09:11',
                'updated_at' => '2022-07-11 13:09:11',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Construction of Parking Lots at Detention Pond which is claimed be hazardous area and is under POLICE authority',
                'way_forward' => 'Agreement was done to base with the original designs without additional features such as recreational area, toilets, askari hut etc. Harmonization meeting to be done with Police Officers to discuss how to operate Parking since they discourage it for public use.',
                'entity_id' => 2,
                'entity_type' => 'App\\Models\\ProcuringEntityPackage',
                'created_at' => '2022-07-11 13:09:11',
                'updated_at' => '2022-07-11 13:09:11',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}