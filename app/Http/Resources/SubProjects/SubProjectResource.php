<?php

namespace App\Http\Resources\SubProjects;


use App\Http\Resources\MediaResource;
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
            'project_id' => $this->project_id,
            'details' => new SubProjectDetailResource($this->details),
            'surveys' => $this->surveys,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'type' => new SubProjectTypeResource($this->type),
            'geo_json' => $this->geo_json,
            'districts' => $this->districts,
        ];
    }
}
