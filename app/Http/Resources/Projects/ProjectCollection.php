<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\SubProjectResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $total_pages = ceil($this->total() / $this->perPage());
        return [
            'data' => ProjectResource::collection($this->collection),
            'links' => [
                'next_page_url' => $this->nextPageUrl(),
                'prev_page_url' => $this->previousPageUrl(),
                'last_page_url' => $this->url($this->lastPage()),
                'first_page_url' => $this->url(1),
                'path' => $this->path(),
            ],
            'meta' => [
                'per_page' => $this->perPage(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
                'last_page' => $this->lastPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $total_pages,
                'total' => $this->total(),
            ],
        ];
    }
}
