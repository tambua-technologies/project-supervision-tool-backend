<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\AgencyResource;
use App\Http\Resources\MoneyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailResource extends JsonResource
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
            'project_id' => $this->project_id,
            'status' => $this->status,
            'borrower' => new  AgencyResource($this->borrower),
            'project_region' => $this->project_region,
            'approval_date' => $this->approval_date,
            'approval_fy' => $this->approval_fy,
            'closing_date' => $this->closing_date,
            'implementing_agency' => new AgencyResource($this->implementing_agency),
            'funding_organisation' => new AgencyResource($this->funding_organisation),
            'environmental_category' => $this->environmental_category,
            'total_project_cost' => new MoneyResource($this->total_project_cost),
            'commitment_amount' => new MoneyResource($this->commitment_amount),

        ];
    }
}
