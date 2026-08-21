<?php

namespace Modules\CentralTenants\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\CentralTenants\Enums\TenantInvitationStatus;
use Modules\CentralTenants\Models\TenantInvitation;

class AcceptTenantInvitation
{
    use AsAction;

    public function handle(TenantInvitation $invitation, User $user): void
    {
        setPermissionsTeamId($invitation->tenant_id);
        $user->assignRole($invitation->role);

        $invitation->update([
            'status' => TenantInvitationStatus::Accepted,
            'accepted_at' => now(),
        ]);
    }
}