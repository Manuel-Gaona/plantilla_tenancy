<?php

use Illuminate\Support\Facades\Route;
use Modules\SaasAdmin\Http\Controllers\SaasAdminController;

Route::get('/saas-admin', [SaasAdminController::class, 'index'])->name('saasadmin.index');
