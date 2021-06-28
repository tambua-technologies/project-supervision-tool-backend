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
            'packages' => $this->packages,
            'contracts' => $this->contracts,
            'contractors' => $this->contractors,
            'subProjects' => $this->subProjects,
            'supervisingConsultants' => $this->supervisingConsultants,
            'agency' => $this->agency,
            'project_id' => $this->project_id,
            'project' => $this->project,
            'project_sub_component' => $this->project_sub_component,
            'project_component' => $this->projectComponent,
            'project_component_id' => $this->project_component_id,
            'updated_at' => $this->updated_at,
        ];
    }
}
