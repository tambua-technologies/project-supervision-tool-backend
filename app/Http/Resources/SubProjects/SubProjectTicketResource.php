<?php

namespace App\Http\Resources\SubProjects;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectTicketResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->description,
            'location' => $this->location,
            'address' => $this->address,
            'ttr' => $this->ttr,
            'expected_at' => $this->expected_at,
            'resolved_at' => $this->resolved_at,
            'agency_responsible_id' => $this->agencyResponsible,
            'priority_id' => $this->priority,
            'operator_id' => $this->operator,
            'assignee_id' => $this->assignee,
            'reporter_id' => $this->reporter,
            'ticket_reporting_method_id' => $this->ticketReportingMethod,
            'ticket_status_id' => $this->ticketStatus,
            'ticket_type_id' => $this->ticketType,
            'sub_project' => $this->subProject,
        ];
    }
}
