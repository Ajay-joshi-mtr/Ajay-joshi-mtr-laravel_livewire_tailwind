<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;

trait HasTable
{
    use WithPagination, CanFlash;

    /** @var int */
    public $perPage = 10;

    /** @var bool */
    public $sortDirection = 'asc';

    /** created due to conflict */
    public $sortDirectionDescDefault = 'desc';

    /** @var string */
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    /**
     * Sort results by field.
     *
     * @param  string  $field
     * @return void
     */
    public function sortBy($field)
    {
        if ($this->sortField === $field && $this->sortDirection === 'asc') {
            $this->sortDirection = 'desc';
        } elseif ($this->sortField === $field && $this->sortDirection === 'asc') {
            $this->sortDirection = 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function sortByDescDefault($field)
    {
        if ($this->sortField === $field && $this->sortDirectionDescDefault === 'asc') {
            $this->sortDirectionDescDefault = 'desc';
        } elseif ($this->sortField === $field && $this->sortDirectionDescDefault === 'asc') {
            $this->sortDirectionDescDefault = 'asc';
        } else {
            $this->sortDirectionDescDefault = 'asc';
        }

        $this->sortField = $field;
    }
}
