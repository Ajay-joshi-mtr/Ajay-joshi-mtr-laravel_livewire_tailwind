<?php

namespace App\Filters;

class TopicFilter extends Filter
{
    // filter by title
    public function search($term = null)
    {
        // filter by title
        $this->when($term, function ($query, $term) {
            $query->where('title', 'LIKE', "%$term%");
        });

        return $this;
    }
    
}