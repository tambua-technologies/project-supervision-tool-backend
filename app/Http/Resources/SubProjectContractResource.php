<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectContractResource extends JsonResource
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
            'contract_cost' => $this->contract_cost,
            'contract_time' => $this->contract_time,
            'sub_project_id' => $this->sub_project_id,
            'contractor' => new AgencyResource($this->contractor),
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
