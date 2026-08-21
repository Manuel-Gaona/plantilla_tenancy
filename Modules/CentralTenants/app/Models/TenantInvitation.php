<?php

namespace Modules\CentralTenants\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CentralTenants\Database\Factories\TenantInvitationFactory;

use App\Models\User;
use Illuminate\Support\Str;
use Modules\CentralTenants\Enums\TenantInvitationStatus;

class TenantInvitation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['tenant_id', 'email', 'role', 'invited_by'];

    protected function casts(): array
    {
        return [
            'status' => TenantInvitationStatus::class,
            'accepted_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $invitation) {
            $invitation->token ??= Str::random(40);
            $invitation->status ??= TenantInvitationStatus::Pending;
        });
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    // protected static function newFactory(): TenantInvitationFactory
    // {
    //     // return TenantInvitationFactory::new();
    // }
}
