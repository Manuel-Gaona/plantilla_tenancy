<?php

namespace Modules\Account\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TenantDashboard extends Component
{
    #[Validate('required|string|max:255')]
    public string $newTenantName = '';

    public function createTenant(): void
    {
        $this->validate();

        $slug = Str::slug($this->newTenantName).'-'.Str::lower(Str::random(4));
        $centralDomain = config('tenancy.central_domains.0');

        $tenant = Tenant::create(['name' => $this->newTenantName]);
        $tenant->createDomain("{$slug}.{$centralDomain}");
        $tenant->users()->attach(Auth::id(), ['role' => 'owner']);

        $this->reset('newTenantName');
    }

    public function render()
    {
        return view('account::livewire.tenant-dashboard', [
            'tenants' => Auth::user()->tenants()->with('domains')->get(),
        ]);
    }
}
