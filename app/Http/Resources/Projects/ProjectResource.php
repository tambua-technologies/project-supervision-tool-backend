<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\AgencyResource;
use App\Http\Resources\MoneyResource;
use App\Http\Resources\ProjectComponentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'color' => $this->color,
            'lga_count' => $this->lga_count,
            'wb_project_id' => $this->wb_project_id,
            'shapefiles' => $this->shapefiles,
            'description' => $this->description,
            'status' => $this->projectStatus,
            'leaders' => $this->leaders,
            'sectors' => $this->sectors,
            'themes' => $this->themes,
            'country' => $this->country,
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
            'components' => ProjectComponentResource::collection($this->whenLoaded('components')),
            'regions' => $this->regions,

        ];
    }
}
