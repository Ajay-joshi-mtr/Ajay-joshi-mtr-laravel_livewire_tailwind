<?php

namespace App\Filters;

class RequestFilter extends Filter
{
    public function search($term = null)
    {
        // filter by title
        $this->when($term, function ($query, $term) {
            $query->where('research_title', 'LIKE', "%$term%")
            ->orWhere('research_area', 'LIKE', "%$term%")
            ->orWhere('research_domain', 'LIKE', "%$term%");
        });

        return $this;
    }
}