<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InitiativeResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'initiative_type' => $this->initiativeType,
            'meta' => $this->meta,
            'location' => new LocationResource($this->location),
            'actor_type' => $this->actorType,
            'focal_person' => $this->focalPerson,
            'implementing_partners' => $this->implementing_partners ? AgencyResource::collection($this->implementing_partners) : [],
            'funding_organisations' => $this->funding_organisations? AgencyResource::collection($this->funding_organisations) : [],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
