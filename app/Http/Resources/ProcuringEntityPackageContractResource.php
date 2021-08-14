<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringEntityPackageContractResource extends JsonResource
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
            'name' => $this->name,
            'contract_no' => $this->contract_no,
            'original_contract_sum' => $this->original_contract_sum,
            'addendum_amount_to_the_contract' => $this->addendum_amount_to_the_contract,
            'revised_contract_sum' => $this->addendum_amount_to_the_contract,
            'date_contract_agreement_signed' => $this->date_contract_agreement_signed,
            'date_of_commencement_of_works' => $this->date_contract_agreement_signed,
            'date_possession_of_site_given' => $this->date_possession_of_site_given,
            'date_of_end_of_mobilization_period' => $this->date_of_end_of_mobilization_period,
            'date_of_contract_completion' => $this->date_of_contract_completion,
            'revised_date_of_contract_completion' => $this->revised_date_of_contract_completion,
            'defects_liability_notification_period' => $this->defects_liability_notification_period,
            'original_contract_period' => $this->original_contract_period,
            'revised_contract_period' => $this->revised_contract_period,
            'actual_physical_progress' => $this->actual_physical_progress,
            'planned_physical_progress' => $this->planned_physical_progress,
            'financial_progress' => $this->financial_progress,
            'package' => $this->package,
            'contractor' => $this->contractor,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
