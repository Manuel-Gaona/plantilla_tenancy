<x-account::layout title="Restablecer contraseña">
    <h1 class="text-xl font-semibold mb-6">Restablecer contraseña</h1>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label class="block text-sm mb-1" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus
                class="w-full rounded border-gray-300">
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm mb-1" for="password">Nueva contraseña</label>
            <input id="password" name="password" type="password" required class="w-full rounded border-gray-300">
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm mb-1" for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="w-full rounded border-gray-300">
        </div>

        <button type="submit" class="w-full rounded bg-gray-900 text-white py-2">
            Restablecer contraseña
        </button>
    </form>
</x-account::layout>
