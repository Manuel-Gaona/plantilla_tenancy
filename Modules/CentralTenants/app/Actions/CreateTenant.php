<?php

namespace Modules\CentralTenants\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\CentralTenants\Models\Tenant;

class CreateTenant
{
    use AsAction;

    public function handle(User $owner, string $name, string $subdomain): Tenant
    {
        $tenant = Tenant::create(['name' => $name]);

        $tenant->domains()->create([
            'domain' => $subdomain.'.'.config('tenancy.central_domains.0'),
        ]);

        setPermissionsTeamId($tenant->id);
        $owner->assignRole('owner');

        return $tenant;
    }
}