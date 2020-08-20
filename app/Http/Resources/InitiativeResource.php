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
            'initiative_type' => $this->description,
            'meta' => $this->meta,
            'location' => new LocationResource($this->location),
            'actor_type' => $this->actorType,
            'implementing_partners' => AgencyResource::collection($this->implementing_partners),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
