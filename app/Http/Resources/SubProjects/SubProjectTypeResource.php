<?php


namespace App\Http\Resources\SubProjects;

use App\Http\Resources\UnitResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectTypeResource extends JsonResource
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
            'description' => $this->description,
            'unit' => new UnitResource($this->unit),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
