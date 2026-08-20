<div class="max-w-2xl space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-semibold">Mis tenants</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm underline">Cerrar sesión</button>
        </form>
    </div>

    <ul class="divide-y divide-gray-200 border rounded">
        @forelse ($tenants as $tenant)
            <li class="p-4">
                <p class="font-medium">{{ $tenant->name ?? $tenant->id }}</p>
                @foreach ($tenant->domains as $domain)
                    <a href="http://{{ $domain->domain }}" class="text-sm text-blue-600 underline" target="_blank">
                        {{ $domain->domain }}
                    </a>
                @endforeach
            </li>
        @empty
            <li class="p-4 text-sm text-gray-500">Todavía no tienes tenants.</li>
        @endforelse
    </ul>

    <form wire:submit="createTenant" class="space-y-4">
        <div>
            <label class="block text-sm mb-1" for="newTenantName">Nuevo tenant</label>
            <input id="newTenantName" type="text" wire:model="newTenantName" class="w-full rounded border-gray-300">
            @error('newTenantName') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="rounded bg-gray-900 text-white px-4 py-2" wire:loading.attr="disabled">
            Crear tenant
        </button>
    </form>
</div>
