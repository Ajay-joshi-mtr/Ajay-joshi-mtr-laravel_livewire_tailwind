<?php

namespace App\Filters;

class PermissionFilter extends Filter
{
    public function search($term = null)
    {
        // filter by title
        $this->when($term, function ($query, $term) {
            $query->where('name', 'LIKE', "%$term%");
        });

        return $this;
    }
}