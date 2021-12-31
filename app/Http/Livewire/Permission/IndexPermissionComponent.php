<?php

namespace App\Http\Livewire\Permission;

use App\Http\Livewire\HasLivewireAuth;
use App\Http\Livewire\HasTable;
use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPermissionComponent extends Component
{
    use HasTable, HasLivewireAuth, WithPagination;

    public $sortField = 'created_at';
    public $search = '';
    protected $queryString = [
        'perPage',
        'sortField',
        'search',
        'sortDirection'
    ];
    protected $listeners = [
        'entity-deleted'=>'render',
    ];

    public function render()
    {
        $permissions = Permission::filter([
            'orderByField' => [$this->sortField, $this->sortDirection],
            'search' => trim($this->search),
        ])->paginate($this->perPage);
        return view('permissions.index', ['permissions'=>$permissions])->extends('layouts.app');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = '';
    }

    public function paginationView()
    {
        return 'pagination.livewire-tailwind';
    }
}
