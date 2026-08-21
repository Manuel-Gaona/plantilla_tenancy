<?php

use Illuminate\Support\Facades\Route;
use Modules\CentralTenants\Http\Controllers\CentralTenantsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('centraltenants', CentralTenantsController::class)->names('centraltenants');
});
