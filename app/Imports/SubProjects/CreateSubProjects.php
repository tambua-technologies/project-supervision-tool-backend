<?php

namespace App\Imports\SubProjects;

use App\Models\ProcuringEntityPackage;
use App\Models\SubProject;
use App\Models\SubProjectStatus;
use App\Models\SubProjectType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreateSubProjects implements ToCollection,SkipsEmptyRows,WithHeadingRow
{

    public function collection(Collection $collection)
    {

        $collection->map(function ($data) {

            $geo = $data['geo'];
            if ($geo) {

                // get package
                $package = ProcuringEntityPackage::join('procuring_entities', 'procuring_entity_packages.procuring_entity_id', 'procuring_entities.id')
                    ->join('agencies', 'procuring_entities.agency_id', 'agencies.id')
                    ->selectRaw('procuring_entity_packages.*, project_id')
                    ->where('agencies.name', 'ilike', $data['procuring_entity'])
                    ->where('procuring_entity_packages.name', 'ilike', $data['package'])
                    ->first();

                $type = SubProjectType::where('name', 'ilike', $data['type'])->first();
                $status = SubProjectStatus::where('name', 'ilike', $data['status'])->first();
                $unit = $type->unit()->first();
                $quantity = ["unit" => $unit->code, "quantity" => $data["quantity"]];


                $subProjectDistrictQuery = "select * from districts where ST_Intersects(ST_Transform(ST_GeomFromText('$geo',21037),4326), geom::geometry)";
                $subProjectGeoDataQuery = "SELECT jsonb_build_object(  'type', 'Feature', 'geometry',   ST_AsGeoJSON(ST_Transform(ST_SetSRID(geom, 21037),4326))::jsonb, 'properties', to_jsonb('{}'::json)) AS json FROM (VALUES ('$geo'::geometry)) AS t( geom)";

                $geoJson = DB::select($subProjectGeoDataQuery)[0];
                $district = DB::select($subProjectDistrictQuery)[0];

                SubProject::create([
                    'name' => $data['name'],
                    'quantity' => $quantity,
                    'project_id' => $package->project_id,
                    'procuring_entity_id' => $package->procuring_entity_id,
                    'sub_project_status_id' => $status->id,
                    'sub_project_type_id' => $type->id,
                    'district_id' => $district->id,
                    'procuring_entity_package_id' => $package->id,
                    'geo_json' => json_decode($geoJson->json)
                ]);
            }
        });
    }
}
