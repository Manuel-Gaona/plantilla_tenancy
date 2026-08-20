<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        // dd(\App\Models\User::all());
        // return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');

        // imprimir los usuarios de forma legible en pagina web, junto con un titulo e informacion del tenant actual, usando la funcion tenant() para obtener el id del tenant actual y mostrarlo en la pagina web
        $tenantId = tenant('id');
        $tenantDomain = tenant('domain');
        $tenantCreatedAt = tenant('created_at');
        $tenantUpdatedAt = tenant('updated_at');
        $tenantInfo = "Tenant ID: $tenantId, Domain: $tenantDomain, Created At: $tenantCreatedAt, Updated At: $tenantUpdatedAt";
        $users = \App\Models\User::all();
        $usersArray = $users->toArray();
        
        echo "<h1>Tenant Information</h1>";
        echo "<p>$tenantInfo</p>";
        echo "<h2>Users</h2>";
        echo "<pre>";
        print_r($usersArray);
        echo "</pre>";
    });
});
