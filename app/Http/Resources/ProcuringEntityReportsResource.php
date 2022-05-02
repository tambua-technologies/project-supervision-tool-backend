<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringEntityReportsResource extends JsonResource
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
            'report_title' => $this->report_title,
            'report_number' => $this->report_number,
            'summary' => $this->summary,
            'procuring_entity_id' => $this->procuring_entity_id,
            'media' => $this->getFirstMedia(),
            'start' => $this->start,
            'end' => $this->end,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
