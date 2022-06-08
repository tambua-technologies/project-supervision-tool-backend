<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageContractStaffResource extends JsonResource
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
            'proposed_name' => $this->proposed_name,
            'replacement' => $this->replacement,
            'remarks' => $this->remarks,
            'position' => $this->position,
        ];
    }
}
