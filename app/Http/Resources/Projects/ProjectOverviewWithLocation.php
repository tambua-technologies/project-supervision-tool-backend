<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Locations\LocationWithDistrict;
use App\Http\Resources\Locations\LocationWithRegion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectOverviewWithLocation extends JsonResource
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
            'details' => new ProjectDetailResource($this->details),
        ];
    }
}
