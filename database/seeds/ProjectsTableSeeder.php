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

        \DB::table('projects')->insert(array(
            0 =>
                array(
                    'wb_project_id' => 'P123134',
                    'name' => 'Dar es Salaam Metropolitan Development Project',
                    'code' => 'DMDP',
                    'project_status_id' => 1,
                    'country_id' => 'TZ',
                    'description' => 'The development objective of the Dar es Salaam Metropolitan Development Project for Tanzania is to improve urban services and institutional capacity in the Dar es Salaam metropolitan area, and to facilitate potential emergency response. The project comprises of four components. The first component priority infrastructure will finance improvements and constructions of: (i) priority roads - local and feeder roads in the urban core to alleviate congestion hotspots, and support public transit, mobility, and connectivity to low income communities, especially improving accessibility to the bus rapid transit (BRT) system; and (ii) primary and secondary drainage systems - including bank stabilization, detention ponds, connection to the secondary network etc. around five river basins of Dar es Salaam. It consists of following three sub-components: (i) priority roads supporting public transit, mobility, and connectivity to low income communities; (ii) flood control and storm water drainage; and (iii) contingency for disaster risk response. The second component, upgrading in low-income communities include: (a) roads and road-related infrastructure, including roads, bridges, culverts, footpaths, and traffic lights; (b) environmental related works, including storm water drainage, sanitation, tertiary solid waste management, street lights; and (c) community related amenities, including parks, markets, and bus stands. The third component, institutional strengthening, capacity building, and urban analytics will support: (i) development of metropolitan governance arrangements and systems; (ii) municipal finances and technical capacity through own source revenue collection and development and integration of geographic information systems (GIS); (iii) improving the integration of transport and land-use planning; (iv) operations and maintenance systems; (v) urban analytics; and (vi) urba',
                    'created_at' => '2021-03-31 14:11:47',
                    'updated_at' => '2021-03-31 14:11:47',
                    'deleted_at' => NULL,
                    'layer_typename' => 'geonode:ref_roads_merge',
                    'color' => '#558fa5',
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
                ),
            1 =>
                array(
                    'wb_project_id' => 'P171189',
                    'name' => 'Tanzania Cities Transforming Infrastructure & Competitiveness Project',
                    'code' => 'TACTIC',
                    'project_status_id' => 4,
                    'country_id' => 'TZ',
                    'description' => 'To strengthen urban management performance and deliver improved basic infrastructure and services in participating urban local gover nment authorities',
                    'created_at' => '2021-04-04 13:15:23',
                    'updated_at' => '2021-04-04 13:15:23',
                    'deleted_at' => NULL,
                    'layer_typename' => 'geonode:final_proj_sites_12_04_2020',
                    'color' => '#e49124',
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
                ),
            2 =>
                array(
                    'wb_project_id' => 'P165128',
                    'name' => 'Boosting Inclusive Growth for Zanzibar: Integrated Development Project',
                    'code' => 'BIGZ',
                    'project_status_id' => 4,
                    'country_id' => 'TZ',
                    'description' => 'The development objective of the project is to improve living conditions and service delivery in targeted areas in Zanzibar and to e nhance institutional capacity of the government.',
                    'created_at' => '2021-04-04 13:15:23',
                    'updated_at' => '2021-04-04 13:15:23',
                    'deleted_at' => NULL,
                    'layer_typename' => 'geonode:final_proj_sites_12_04_2020',
                    'color' => '#8b60b7',
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
                ),
        ));


    }
}
