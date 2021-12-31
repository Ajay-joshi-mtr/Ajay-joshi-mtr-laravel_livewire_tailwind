<?php

namespace App\Filters;

class TypeFilter extends Filter
{
    public function search($term = null)
    {
        // filter by title
        $this->when($term, function ($query, $term) {
            $query->where('title', 'LIKE', "%$term%");
        });

        return $this;
    }
}