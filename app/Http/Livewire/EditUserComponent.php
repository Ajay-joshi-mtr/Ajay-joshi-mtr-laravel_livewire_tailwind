<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Component;

class EditUserComponent extends Component
{
    use HasLivewireAuth;

    /** @var \App\Models\User */
    public User $user;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $roles;
    public $newPassword;

    /**
     * Component mount.
     *
     * @return void
     */
    public function mount()
    {
        if ($this->user->isHimself(auth()->user())) {
            throw new AuthorizationException();
        }
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->roles = Role::orderBy('name')->get();

        return view('users.edit')
            ->extends('layouts.app');
    }

    /**
     * Update existing user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->validate($this->validationRules());
        if (strlen($this->newPassword) >= 8)
            $this->user->savePassword($this->newPassword);

        $this->user->save();

        msg_success('User has been successfully updated.');

        return redirect()->route('users.index');
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function validationRules()
    {
        return [
            'user.email' => [
                'required',
                'email',
                'unique:users,email,' . $this->user->id,
            ],
            'user.role_id' => [
                'required',
                'exists:roles,id',
            ],
            'user.full_name' => [
                'required',
            ],
            'user.mobile' => [
                'required',
            ],
            'user.mobile_alt' => [],
            'user.city' => [
                'max:50',
            ],
            'user.address' => [
                'max:100',
            ],
            'user.state' => [
                'max:50',
            ],
            'user.pincode' => [
                'size:6',
            ],
            'newPassword' => [
                'min:8',
                'nullable',
            ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'user.full_name' => [
                'required',
            ],
            'user.mobile' => [
                'required',
            ],
            'user.mobile_alt' => [
                'required',
            ],
            'user.city' => [
                'required',
            ],
            'user.address' => [
                'required',
            ],
            'user.state' => [
                'required',
            ],
            'user.pincode' => [
                'required',
            ],
            'user.email' => [
                'required',
            ],
            'user.role_id' => [
                'required',
            ],
            'newPassword' => [],
        ];
    }
}
