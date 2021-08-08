<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringEntityContractResource extends JsonResource
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
            'procuring_entity_id' => $this->procuring_entity_id,
            'name' => $this->name,
            'contract_no' => $this->contract_no,
            'original_contract_sum' => $this->original_contract_sum,
            'revised_contract_sum' => $this->revised_contract_sum,
            'original_signing_date' => $this->original_signing_date,
            'revised_signing_date' => $this->revised_signing_date,
            'commencement_date' => $this->commencement_date,
            'contract_period' => $this->contract_period,
            'revised_end_date_of_contract' => $this->revised_end_date_of_contract,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'financers' => $this->financers,
            'consultants' => $this->consultants
        ];
    }
}
