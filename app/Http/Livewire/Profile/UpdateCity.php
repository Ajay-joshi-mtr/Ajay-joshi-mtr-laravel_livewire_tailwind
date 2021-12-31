<?php

namespace App\Http\Livewire\Profile;

use App\Http\Livewire\CanFlash;
use App\Rules\PasswordCheckRule;
use Illuminate\Auth\AuthenticationException;
use Livewire\Component;

class UpdateCity extends Component
{

    use CanFlash;

    public $user;
    public $city;

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
            'city' => $this->city,
        ]);
        
        msg_success('Your City has been successfully updated');

        return redirect()->route('profile.users.index');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.profile.update-city');
    }

    /**
     * Get the validation rules.
     *
     * @return array
     */
    private function validationRules()
    {
        return [
            'city' => [
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
        $this->city = '';
    }
}
