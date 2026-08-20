<?php

namespace Modules\TenantCore\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Laravel\Pennant\Feature;
use Modules\TenantCore\Models\PageView;

class TenantCoreController extends Controller
{
    public function index(): View
    {
        $views = PageView::firstOrCreate([]);
        $views->increment('count');

        return view('tenantcore::index', [
            'tenantId' => tenant('id'),
            'domain' => request()->getHost(),
            'count' => $views->count,
            'exampleModuleToggle' => Feature::for(tenant())->active('example-module-toggle'),
        ]);
    }
}
