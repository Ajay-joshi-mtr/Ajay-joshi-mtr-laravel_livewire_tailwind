<?php

namespace App\Filters;

class ChapterRequestFilter extends Filter
{
    // filter by status
    public function search($term = null)
    {
        // filter by title
        $this->when($term, function ($query, $term) {
            $query->where('status', 'LIKE', "%$term%");
        });

        return $this;
    }
    
}