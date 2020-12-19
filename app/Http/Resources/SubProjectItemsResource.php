<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectItemsResource extends JsonResource
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
            'item' => $this->item,
            'progress' => $this->progress,
            'sub_project_id' => $this->sub_project_id,
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
