<?php

namespace App\Imports\SubProjects;

use App\Models\ProcuringEntityPackage;
use App\Models\SubProject;
use App\Models\SubProjectStatus;
use App\Models\SubProjectType;
use App\Models\Unit;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreateSubProjects implements ToCollection, SkipsEmptyRows, WithHeadingRow
{

    private function getSubProjectQuantity($data): array
    {
        // return if type is found
        $type = $data['type'] ? SubProjectType::where('name', 'ilike', $data['type'])->first() : null;


        // create new type if given one doesnt exist
        if ($data['type']) {

            $u = $data['unit'] || 'unknown';

            $unit = Unit::create([
                'name' => $u,
                'description' => $u,
                'code' => $u,
            ]);

            $type = SubProjectType::create([
                'name' => $data['type'],
                'description' => $data['type'],
                'unit_id' => $unit->id,
            ]);
        }

        $unit = $type ? $type->unit()->first() : null;
        return ["unit" => $unit->code ?? null, "quantity" => $data["quantity"]];


    }

    private function getSubProjectGeo($data)
    {
        $geo = $data['geo'];
        if ($geo) {


            $subProjectGeoDataQuery = "SELECT jsonb_build_object(  'type', 'Feature', 'geometry',   ST_AsGeoJSON(ST_Transform(ST_SetSRID(geom, 21037),4326))::jsonb, 'properties', to_jsonb('{}'::json)) AS json FROM (VALUES ('$geo'::geometry)) AS t( geom)";

            return DB::select($subProjectGeoDataQuery)[0];
        }

        return null;

    }

    public function collection(Collection $collection)
    {


        $collection->map(function ($data) {
            $package = ProcuringEntityPackage::join('procuring_entities', 'procuring_entity_packages.procuring_entity_id', 'procuring_entities.id')
                ->join('agencies', 'procuring_entities.agency_id', 'agencies.id')
                ->selectRaw('procuring_entity_packages.*, project_id')
                ->where('agencies.name', 'ilike', $data['procuring_entity'])
                ->where('procuring_entity_packages.name', 'ilike', $data['package'])
                ->first();
            $procuringEntity = $package->procuringEntity()->first();
            $agency = $procuringEntity->agency()->first();
            $district = $agency->district()->first();
            $status = SubProjectStatus::where('name', 'ilike', $data['status'])->first();
            $quantity = $this->getSubProjectQuantity($data);
            $geoJson = $this->getSubProjectGeo($data);

            SubProject::createOrCreate(
                [
                    'name' => $data['name'],
                    'project_id' => $package->project_id,
                    'procuring_entity_id' => $package->procuring_entity_id,
                    'procuring_entity_package_id' => $package->id,
                ],
                [
                    'quantity' => $quantity,
                    'sub_project_status_id' => $status->id,
                    'sub_project_type_id' => $type->id ?? null,
                    'district_id' => $district->id,
                    'geo_json' => $geoJson ? json_decode($geoJson->json) : null
                ]);



        });
    }
}
