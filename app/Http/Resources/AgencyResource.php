<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'website' => $this->website,
            'focalPerson' => $this->focalPerson,
            'agencyType' => $this->agencyType,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
