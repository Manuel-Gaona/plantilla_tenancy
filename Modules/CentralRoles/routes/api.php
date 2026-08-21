<?php

use Illuminate\Support\Facades\Route;
use Modules\CentralRoles\Http\Controllers\CentralRolesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('centralroles', CentralRolesController::class)->names('centralroles');
});
