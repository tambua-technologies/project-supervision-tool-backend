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
            'procuring_entity_id' => $this->procuring_entity_id,
            'procuring_entity' => new ProcuringEntityResource($this->procuringEntity),
            'contract' => new SubProjectContractResource($this->contract),
            'sub_projects' => $this->sub_projects,
            'updated_at' => $this->updated_at,

        ];
    }
}
