<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectHrResource extends JsonResource
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
            'quantity' => $this->quantity,
            'position' => $this->position,
            'sub_project_id' => $this->sub_project_id,
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
