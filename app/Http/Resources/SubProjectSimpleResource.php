<?php

namespace App\Http\Resources;

use App\Http\Resources\Locations\LocationWithPoint;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectSimpleResource extends JsonResource
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
            'project_id' => $this->project_id,
            'sub_project_milestones' => $this->sub_project_milestones,
            'sub_project_progress' => $this->sub_project_progress,
            'sub_project_locations' => LocationWithPoint::collection($this->sub_project_locations),

        ];
    }
}
