<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Locations\LocationWithRegion;
use App\Http\Resources\ProjectComponentResource;
use App\Http\Resources\SubProjectResource;
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
            'status' => $this->status,
            'leaders' => $this->leaders,
            'sectors' => $this->sectors,
            'themes' => $this->themes,
            'components' => ProjectComponentResource::collection($this->components),
            'details' => new ProjectDetailResource($this->details)

        ];
    }
}
