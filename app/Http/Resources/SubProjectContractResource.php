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
            'name' => $this->contract_no,
            'contract_no' => $this->contract_no,
            'contract_cost' => new ContractCostResource($this->contract_cost),
            'contract_time' => $this->contract_time,
            'contractor' => new AgencyResource($this->contractor),
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
