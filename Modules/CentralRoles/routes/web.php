<?php

use Illuminate\Support\Facades\Route;
use Modules\CentralRoles\Http\Controllers\CentralRolesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('centralroles', CentralRolesController::class)->names('centralroles');
});
