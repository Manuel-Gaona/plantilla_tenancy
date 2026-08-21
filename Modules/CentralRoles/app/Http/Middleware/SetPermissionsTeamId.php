<?php

namespace Modules\CentralRoles\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetPermissionsTeamId
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Capturamos el ID del tenant desde la URL (ej: mis-tenants/{tenant}/facturacion)
        $tenant = $request->route('tenant');
        
        if ($tenant) {
            $tenantId = is_object($tenant) ? $tenant->id : $tenant;
            setPermissionsTeamId($tenantId);
        }

        return $next($request);
    }
}
