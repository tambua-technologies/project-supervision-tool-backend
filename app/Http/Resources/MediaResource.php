<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->getCustomProperty('description'),
            'owner' => $this->getCustomProperty('owner'),
            'latitude' => $this->getCustomProperty('latitude'),
            'longitude' => $this->getCustomProperty('longitude'),
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'size' => $this->human_readable_size,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'url' => $this->getFullUrl()
        ];
    }
}
