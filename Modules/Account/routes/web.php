<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/account', 'account::dashboard')->name('account.dashboard');
});
