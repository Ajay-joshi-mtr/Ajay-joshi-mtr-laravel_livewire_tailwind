<?php

namespace App\Http\Livewire\Permission;

use App\Http\Livewire\CanFlash;
use App\Http\Livewire\HasLivewireAuth;
use Livewire\Component;

class DeletePermissionComponent extends Component
{
    use CanFlash, HasLivewireAuth;
    public $permission;

    public function render()
    {
        return view('permissions.delete');
    }

    public function destroy()
    {
        $this->permission->delete();
        $this->dispatchFlashSuccessEvent('Permission has been successfully deleted!');
        $this->emit('entity-deleted');
    }
}
