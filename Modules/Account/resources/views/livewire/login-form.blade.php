<form wire:submit="login" class="space-y-4">
    <div>
        <label class="block text-sm mb-1" for="email">Email</label>
        <input id="email" type="email" wire:model="email" required autofocus class="w-full rounded border-gray-300">
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm mb-1" for="password">Contraseña</label>
        <input id="password" type="password" wire:model="password" required class="w-full rounded border-gray-300">
        @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <label class="flex items-center gap-2 text-sm">
        <input type="checkbox" wire:model="remember">
        Recordarme
    </label>

    <button type="submit" class="w-full rounded bg-gray-900 text-white py-2" wire:loading.attr="disabled">
        Iniciar sesión
    </button>

    <a href="{{ route('password.request') }}" class="block text-sm underline text-center">
        ¿Olvidaste tu contraseña?
    </a>
</form>
