<?php


namespace App\Http\Resources;

use App\Http\Resources\Locations\LocationAllGeoJsons;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectWithDistrict extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'details' => new SubProjectDetailResource($this->details),
            'sub_project_items' => SubProjectItemsResource::collection($this->sub_project_items),
            'sub_project_equipments' => SubProjectEquipmentResource::collection($this->sub_project_equipments),
            'sub_project_milestones' => $this->sub_project_milestones,
            'human_resources' => SubProjectHrResource::collection($this->human_resources),
            'progress' => $this->progress,
            'sub_project_contracts' => SubProjectContractResource::collection($this->sub_project_contracts),
            'sub_project_locations' => LocationAllGeoJsons::collection($this->sub_project_locations),
            'photos' =>  MediaResource::collection($this->getMedia('photos')),
        ];
    }
}
