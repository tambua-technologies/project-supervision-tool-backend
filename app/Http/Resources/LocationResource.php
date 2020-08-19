<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'id' => $this->adm1_pcode,
            'level' => $this->level,
            'region' => $this->region ? $this->region: null,
            'district' => $this->district ? $this->district : null,
        ];
    }
}
