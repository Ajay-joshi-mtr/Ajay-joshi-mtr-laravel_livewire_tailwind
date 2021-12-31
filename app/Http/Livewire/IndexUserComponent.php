<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUserComponent extends Component
{
    use HasTable, HasLivewireAuth;
    use WithPagination;

    /** @var string */
    public $sortField = 'created_at';

    public $search = '';

    /** @var string */
    public $roleId = '';

    /** @var array */
    protected $queryString = [
        'perPage',
        'sortField',
        'sortDirection',
        'search',
        'roleId',
    ];

    /** @var array */
    protected $listeners = ['entity-deleted' => 'render'];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $users = User::with('role')
            ->filter([
                'orderByField' => [$this->sortField, $this->sortDirection],
                'search' => trim($this->search),
                'roleId' => $this->roleId, 
            ])->paginate($this->perPage);

        $roles = Role::orderBy('name')->get();

        return view('users.index', ['users' => $users, 'roles' => $roles])
            ->extends('layouts.app');
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

    public function updatingroleId()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'pagination.livewire-tailwind';
    }
}
