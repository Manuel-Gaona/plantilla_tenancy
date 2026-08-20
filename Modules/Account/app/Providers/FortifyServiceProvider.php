<?php

namespace Modules\Account\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Modules\Account\Actions\Fortify\CreateNewUser;
use Modules\Account\Actions\Fortify\ResetUserPassword;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(fn () => view('account::auth.login'));
        Fortify::registerView(fn () => view('account::auth.register'));
        Fortify::requestPasswordResetLinkView(fn () => view('account::auth.forgot-password'));
        Fortify::resetPasswordView(fn (Request $request) => view('account::auth.reset-password', ['request' => $request]));
        Fortify::verifyEmailView(fn () => view('account::auth.verify-email'));

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });
    }
}
