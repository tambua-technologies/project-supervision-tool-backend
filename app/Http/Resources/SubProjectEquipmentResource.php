<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectEquipmentResource extends JsonResource
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
            'quantity_per_contract' => $this->quantity_per_contract,
            'quantity_mobilized' => $this->quantity_mobilized,
            'remarks' => $this->remarks,
            'mobilization_date' => $this->remarks,
            'item' => $this->item,
            'sub_project_id' => $this->sub_project_id,
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
