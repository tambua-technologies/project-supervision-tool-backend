<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectDetailResource extends JsonResource
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
            'phase' => $this->phase,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'contractor' => new AgencyResource($this->contractor),
            'supervising_agency_id' => new AgencyResource($this->supervising_agency_id),
            'actor' => new AgencyResource($this->actor),
            'sub_projects' => $this->sub_projects,
            'details' => new ProjectDetailResource($this->details)

        ];
    }
}
