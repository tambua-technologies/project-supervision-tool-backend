<?php

namespace App\Http\Resources\SubProjects;

use App\Http\Resources\SubProjectResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubProjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $per_page = $this->perPage();
        $total = $this->total();
        $total_pages = ceil($total / $per_page);
        return [
            'data' => SubProjectResource::collection($this->collection),
            'links' => [

                'next_page_url' => $this->nextPageUrl(),
                'prev_page_url' => $this->previousPageUrl(),
                'last_page_url' => $this->url($total_pages),
                'first_page_url' => $this->url(1),
            ],
            'meta' => [
                'per_page' => $per_page,
                'current_page' => $this->currentPage(),
                'total_pages' => $total_pages,
                'total' => $total,
            ],
        ];
    }
}
