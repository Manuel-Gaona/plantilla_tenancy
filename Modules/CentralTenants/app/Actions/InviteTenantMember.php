<?php

namespace Modules\CentralTenants\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\CentralTenants\Models\Tenant;
use Modules\CentralTenants\Models\TenantInvitation;

class InviteTenantMember
{
    use AsAction;

    public function handle(Tenant $tenant, User $invitedBy, string $email, string $role): TenantInvitation
    {
        return TenantInvitation::create([
            'tenant_id' => $tenant->id,
            'email' => $email,
            'role' => $role,
            'invited_by' => $invitedBy->id,
        ]);
    }
}