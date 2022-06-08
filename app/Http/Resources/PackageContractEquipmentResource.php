<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageContractEquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'mobilized' => $this->mobilized,
            'equipment_name' => $this->equipment_name,
            'quantity_as_per_contract' => $this->quantity_as_per_contract,
            'total_available_now' => $this->total_available_now,
            'status_of_equipment' => $this->status_of_equipment,
        ];
    }
}
