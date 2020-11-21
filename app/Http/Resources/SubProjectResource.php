<?php

namespace App\Http\Resources;

use App\Models\SubProjectItems;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'details' =>new SubProjectDetailResource($this->details),
            'sub_project_items' => SubProjectItemsResource::collection($this->sub_project_items),
            'sub_project_equipments' => SubProjectEquipmentResource::collection($this->sub_project_equipments),
            'sub_project_milestones' => $this->sub_project_milestones,
            'human_resources' => SubProjectHrResource::collection($this->human_resources),
            'sub_project_progress' => $this->sub_project_progress,
            'sub_project_contracts' => SubProjectContractResource::collection($this->sub_project_contracts),
            'sub_project_locations' => LocationResource::collection($this->sub_project_locations),

        ];
    }
}