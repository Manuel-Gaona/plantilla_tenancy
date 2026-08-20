<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $domain }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-white text-gray-900 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Tenant: {{ $domain }}</h1>
            <p class="mt-2 text-gray-500">tenant id: {{ $tenantId }}</p>
            <p class="mt-2 text-gray-500">Vistas registradas en esta base de datos: {{ $count }}</p>

            @if ($exampleModuleToggle)
                <div class="mt-6 rounded border border-green-300 bg-green-50 px-4 py-3 text-green-800">
                    example-module-toggle está activo para este tenant.
                </div>
            @else
                <div class="mt-6 rounded border border-gray-300 bg-gray-50 px-4 py-3 text-gray-500">
                    example-module-toggle está desactivado para este tenant.
                </div>
            @endif
        </div>
    </body>
</html>
