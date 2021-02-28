<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Locations\LocationWithRegion;
use App\Http\Resources\SubProjectSimpleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'locations' => LocationWithRegion::collection($this->locations),
            'leaders' => $this->leaders,
            'sectors' => $this->sectors,
            'themes' => $this->themes,
            'sub_projects' => SubProjectSimpleResource::collection($this->sub_projects),
            'details' => new ProjectDetailResource($this->details)

        ];
    }
}
