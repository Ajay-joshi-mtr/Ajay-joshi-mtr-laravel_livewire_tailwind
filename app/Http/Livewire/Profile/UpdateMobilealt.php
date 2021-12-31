<?php

namespace App\Http\Livewire\Profile;

use App\Http\Livewire\CanFlash;
use App\Rules\PasswordCheckRule;
use Illuminate\Auth\AuthenticationException;
use Livewire\Component;

class UpdateMobilealt extends Component
{
    use CanFlash;

    public $user;
    public $mobile_alt;

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
            'mobile_alt' => $this->mobile_alt,
        ]);
        msg_success('Your Secondary Mobile Number has been successfully updated');

        return redirect()->route('profile.users.index');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.profile.update-mobilealt');
    }

    /**
     * Get the validation rules.
     *
     * @return array
     */
    private function validationRules()
    {
        return [
            'mobile_alt' => [
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
        $this->mobile_alt = '';
    }
}
