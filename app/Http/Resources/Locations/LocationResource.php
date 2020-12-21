<?php

namespace App\Http\Resources\Locations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'level' => $this->level,
            'point' => $this->point,
            'region' => $this->region ? new RegionResource($this->region): null,
            'district' => $this->district ? new DistrictResource($this->district) : null,
            'country' => $this->country
        ];
    }
}
