<?php

namespace App\Http\Resources\Locations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationAllGeoJsons extends JsonResource
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
            'region' => $this->region ? new RegionDetailsResource($this->region): null,
            'district' => $this->district ? new DistrictWithGeoJson($this->district) : null,
            'country' => $this->country
        ];
    }
}

