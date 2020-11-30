<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\LocationResource;
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
            'description' => $this->description,
            'locations' => \App\Http\Resources\Locations\LocationResource::collection($this->locations),
            'leaders' => $this->leaders,
            'sectors' => $this->sectors,
            'themes' => $this->themes,
            'sub_projects' => $this->sub_projects,
            'details' => new ProjectDetailResource($this->details)

        ];
    }
}