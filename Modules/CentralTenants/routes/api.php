<?php

use Illuminate\Support\Facades\Route;
use Modules\CentralTenants\Http\Controllers\CentralTenantsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('centraltenants', CentralTenantsController::class)->names('centraltenants');
});
