<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringEntityResource extends JsonResource
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
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'contract' => new ProcuringEntityContractResource($this->contract),
            'agency' => $this->agency,
            'project' => $this->project,
            'packages' => $this->packages,
            'subProjects' => $this->subProjects,
            'procured_project_sub_components' => $this->procuredProjectSubcomponents,
            'procured_project_components' => $this->procuredProjectComponents,

        ];
    }
}
