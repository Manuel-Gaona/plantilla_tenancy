<?php

namespace Modules\SaasAdmin\Providers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Gate;
use Laravel\Pennant\Feature;
use Nwidart\Modules\Support\ModuleServiceProvider;

class SaasAdminServiceProvider extends ModuleServiceProvider
{
    /**
     * The name of the module.
     */
    protected string $name = 'SaasAdmin';

    /**
     * The lowercase version of the module name.
     */
    protected string $nameLower = 'saasadmin';

    /**
     * Command classes to register.
     *
     * @var string[]
     */
    // protected array $commands = [];

    /**
     * Provider classes to register.
     *
     * @var string[]
     */
    protected array $providers = [
        EventServiceProvider::class,
        RouteServiceProvider::class,
    ];

    /**
     * Define module schedules.
     *
     * @param  $schedule
     */
    // protected function configureSchedules(Schedule $schedule): void
    // {
    //     $schedule->command('inspire')->hourly();
    // }

    public function boot(): void
    {
        parent::boot();

        Gate::define('access-saas-admin', fn (User $user) => (bool) $user->is_admin);

        Feature::define('example-module-toggle', fn (Tenant $tenant) => true);
    }
}
