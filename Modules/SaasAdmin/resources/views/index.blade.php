<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SaaS Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gray-50 text-gray-900 p-8">
        <h1 class="text-xl font-semibold mb-6">Tenants (SaaS Admin)</h1>

        <table class="w-full max-w-3xl border rounded text-sm">
            <thead>
                <tr class="border-b bg-gray-100 text-left">
                    <th class="p-3">Tenant</th>
                    <th class="p-3">Dominios</th>
                    <th class="p-3">example-module-toggle</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tenants as $row)
                    <tr class="border-b">
                        <td class="p-3">{{ $row['tenant']->name ?? $row['tenant']->id }}</td>
                        <td class="p-3">
                            @foreach ($row['tenant']->domains as $domain)
                                <div>{{ $domain->domain }}</div>
                            @endforeach
                        </td>
                        <td class="p-3">{{ $row['example_module_toggle'] ? 'activo' : 'inactivo' }}</td>
                    </tr>
                @empty
                    <tr><td class="p-3 text-gray-500" colspan="3">No hay tenants todavía.</td></tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>
