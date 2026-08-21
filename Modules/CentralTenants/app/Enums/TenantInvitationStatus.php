<?php

namespace Modules\CentralTenants\Enums;

enum TenantInvitationStatus: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}