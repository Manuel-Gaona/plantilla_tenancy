<?php

namespace Modules\Account\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function register(CreatesNewUsers $creator): void
    {
        $user = $creator->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        Auth::login($user);
        request()->session()->regenerate();

        $this->redirect(config('fortify.home'), navigate: false);
    }

    public function render()
    {
        return view('account::livewire.register-form');
    }
}
