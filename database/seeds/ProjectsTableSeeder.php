<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('projects')->delete();

        \DB::table('projects')->insert(array (
            0 =>
            array (
                'id' => 'P123134',
                'name' => 'Dar es Salaam Metropolitan Development Project',
                'code' => 'DMDP',
                'description' => 'The development objective of the Dar es Salaam Metropolitan Development Project for Tanzania is to improve urban services and institutional capacity in the Dar es Salaam metropolitan area, and to facilitate potential emergency response. The project comprises of four components. The first component priority infrastructure will finance improvements and constructions of: (i) priority roads - local and feeder roads in the urban core to alleviate congestion hotspots, and support public transit, mobility, and connectivity to low income communities, especially improving accessibility to the bus rapid transit (BRT) system; and (ii) primary and secondary drainage systems - including bank stabilization, detention ponds, connection to the secondary network etc. around five river basins of Dar es Salaam. It consists of following three sub-components: (i) priority roads supporting public transit, mobility, and connectivity to low income communities; (ii) flood control and storm water drainage; and (iii) contingency for disaster risk response. The second component, upgrading in low-income communities include: (a) roads and road-related infrastructure, including roads, bridges, culverts, footpaths, and traffic lights; (b) environmental related works, including storm water drainage, sanitation, tertiary solid waste management, street lights; and (c) community related amenities, including parks, markets, and bus stands. The third component, institutional strengthening, capacity building, and urban analytics will support: (i) development of metropolitan governance arrangements and systems; (ii) municipal finances and technical capacity through own source revenue collection and development and integration of geographic information systems (GIS); (iii) improving the integration of transport and land-use planning; (iv) operations and maintenance systems; (v) urban analytics; and (vi) urba',
                'created_at' => '2021-03-31 14:11:47',
                'updated_at' => '2021-03-31 14:11:47',
                'deleted_at' => NULL,
            ),
        ));


    }
}
