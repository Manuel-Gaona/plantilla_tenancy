<?php

namespace Modules\SaasAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Contracts\View\View;
use Laravel\Pennant\Feature;

class SaasAdminController extends Controller
{
    public function index(): View
    {
        $tenants = Tenant::with('domains')->get()
            ->map(fn (Tenant $tenant) => [
                'tenant' => $tenant,
                'example_module_toggle' => Feature::for($tenant)->active('example-module-toggle'),
            ]);

        return view('saasadmin::index', ['tenants' => $tenants]);
    }
}
