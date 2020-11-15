<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractCostResource extends JsonResource
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
            'works_certified_to_date_percentage' => $this->works_certified_to_date_percentage,
            'contract_award_value' => new MoneyResource($this->contract_award_value),
            'financial_penalties_applied_value' => new MoneyResource($this->financial_penalties_applied_value),
            'financial_penalties_granted_value' => new MoneyResource($this->financial_penalties_granted_value),
            'variations_granted_value' => new MoneyResource($this->variations_granted_value),
            'variations_applied_not_yet_granted_value' => new MoneyResource($this->variations_applied_not_yet_granted_value),
            'estimated_final_contract_price' => new MoneyResource($this->estimated_final_contract_price),
        ];
    }
}
