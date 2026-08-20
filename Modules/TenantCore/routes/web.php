<?php

use Illuminate\Support\Facades\Route;
use Modules\TenantCore\Http\Controllers\TenantCoreController;

Route::get('/', [TenantCoreController::class, 'index'])->name('tenantcore.index');
