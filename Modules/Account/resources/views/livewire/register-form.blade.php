<form wire:submit="register" class="space-y-4">
    <div>
        <label class="block text-sm mb-1" for="name">Nombre</label>
        <input id="name" type="text" wire:model="name" required autofocus class="w-full rounded border-gray-300">
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1" for="email">Email</label>
        <input id="email" type="email" wire:model="email" required class="w-full rounded border-gray-300">
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1" for="password">Contraseña</label>
        <input id="password" type="password" wire:model="password" required class="w-full rounded border-gray-300">
        @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1" for="password_confirmation">Confirmar contraseña</label>
        <input id="password_confirmation" type="password" wire:model="password_confirmation" required
            class="w-full rounded border-gray-300">
    </div>

    <button type="submit" class="w-full rounded bg-gray-900 text-white py-2" wire:loading.attr="disabled">
        Crear cuenta
    </button>
</form>
