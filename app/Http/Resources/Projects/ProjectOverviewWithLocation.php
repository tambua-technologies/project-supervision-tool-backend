<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Locations\LocationWithDistrict;
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
            'description' => $this->description,
            'locations' => LocationWithDistrict::collection($this->locations),
        ];
    }
}
