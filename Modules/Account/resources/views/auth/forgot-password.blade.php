<x-account::layout title="Recuperar contraseña">
    <div class="max-w-md mx-auto">
        <h1 class="text-xl font-semibold mb-6">Recuperar contraseña</h1>

        @if (session('status'))
            <p class="mb-4 text-sm text-green-600">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm mb-1" for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full rounded border-gray-300">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full rounded bg-gray-900 text-white py-2">
                Enviar enlace de recuperación
            </button>
        </form>
    </div>
</x-account::layout>
