<?php

namespace Modules\CentralTenants\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'CentralTenants';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        // OPCIÓN 1: CENTRAL (SaaS, Portales, Marketing) - DEFAULT
        foreach (config('tenancy.central_domains') as $domain) {
            Route::domain($domain)->middleware('web')->group(module_path($this->name, '/routes/web.php'));
        }

        // OPCIÓN 2: TENANT (Sistema de la escuela)
        /*
        Route::middleware([
            'web',
            \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
        ])->group(module_path($this->name, '/routes/web.php'));
        */

        // OPCIÓN 3: BASE (Sin restricción, default de Nwidart)
        /*
        Route::middleware('web')->group(module_path($this->name, '/routes/web.php'));
        */
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        // OPCIÓN 1: CENTRAL (SaaS, Portales, Marketing) - DEFAULT
        foreach (config('tenancy.central_domains') as $domain) {
            Route::domain($domain)->middleware('api')->prefix('api')->name('api.')->group(module_path($this->name, '/routes/api.php'));
        }

        // OPCIÓN 2: TENANT (Sistema de la escuela)
        /*
        Route::middleware([
            'api',
            \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
        ])->prefix('api')->name('api.')->group(module_path($this->name, '/routes/api.php'));
        */
        
        // OPCIÓN 3: BASE (Sin restricción, default de Nwidart)
        /*
        Route::middleware('api')->prefix('api')->name('api.')->group(module_path($this->name, '/routes/api.php'));
        */
    }

}
