<?php

namespace App\Http\Resources\SubProjects;


use App\Http\Resources\MediaResource;
use App\Http\Resources\ProcuringEntityPackageResource;
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
            'code' => $this->code,
            'description' => $this->description,
            'surveys' => $this->surveys,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'type' => new SubProjectTypeResource($this->type),
            'geo_json' => $this->geo_json,
            'package' => $this->procuringEntityPackage,
            'procuring_entity' => $this->procuringEntity,
            'project' => $this->project,
            'district' => $this->district,
        ];
    }
}
