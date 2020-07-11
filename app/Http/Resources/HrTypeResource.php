<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HrTypeResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'meta' => $this->meta,
            'location' => $this->location,
            'hr_type' => new ItemResource($this->hr_type),
            'implementing_partner' => new AgencyResource($this->implementing_partner),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
