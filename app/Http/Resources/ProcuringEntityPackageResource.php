<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringEntityPackageResource extends JsonResource
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
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'procuring_entity_id' => $this->procuring_entity_id,
            'project_component' => $this->projectComponent,
            'project_sub_component' => $this->projectSubComponent,
            'progress' => $this->progress,
            'contract' => new ProcuringEntityPackageContractResource($this->contract),
            'sub_projects_count' => $this->subProjects()->count(),
        ];
    }
}
