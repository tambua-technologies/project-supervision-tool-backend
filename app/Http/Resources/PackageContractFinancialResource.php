<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageContractFinancialResource extends JsonResource
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
            'invoice_no' => $this->invoice_no,
            'particulars' => $this->particulars,
            'amount' => $this->amount,
            'remarks' => $this->remarks,
            'contract' => $this->contract
        ];
    }
}
