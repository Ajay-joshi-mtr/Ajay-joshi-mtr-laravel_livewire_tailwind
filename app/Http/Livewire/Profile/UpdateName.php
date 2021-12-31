<?php

namespace App\Http\Livewire\Profile;

use App\Http\Livewire\CanFlash;
use Illuminate\Auth\AuthenticationException;
use Livewire\Component;

class UpdateName extends Component
{
    use CanFlash;

    public $user;
    public $full_name;

    /**
     * Throws auth exception if user is not authenticated.
     *
     * @return void
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function hydrate()
    {
        if (auth()->guest()) {
            throw new AuthenticationException();
        }
    }

    /**
     * Component mount.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = auth()->user();
    }

    /**
     * Submit the form.
     *
     * @return void
     */
    public function submit()
    {

        $this->validate($this->validationRules());

        $this->user->update([
            'full_name' => $this->full_name,
        ]);
        
        msg_success('Your Name has been successfully updated');

        return redirect()->route('profile.users.index');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.profile.update-name');
    }

    /**
     * Get the validation rules.
     *
     * @return array
     */
    private function validationRules()
    {
        return [
            'full_name' => [
                'required',
            ],
        ];
    }

    /**
     * Reset public properties back to empty string.
     *
     * @return void
     */
    private function clearInput()
    {
        $this->full_name = '';
    }

}
