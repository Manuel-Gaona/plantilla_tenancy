<?php

namespace Modules\Account\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate();

        $throttleKey = Str::transliterate(Str::lower($this->email).'|'.request()->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            throw ValidationException::withMessages([
                'email' => __('Too many login attempts. Please try again in :seconds seconds.', [
                    'seconds' => RateLimiter::availableIn($throttleKey),
                ]),
            ]);
        }

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($throttleKey);

            throw ValidationException::withMessages([
                'email' => __('These credentials do not match our records.'),
            ]);
        }

        RateLimiter::clear($throttleKey);
        request()->session()->regenerate();

        $this->redirect(config('fortify.home'), navigate: false);
    }

    public function render()
    {
        return view('account::livewire.login-form');
    }
}
