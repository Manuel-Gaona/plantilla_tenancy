<x-account::layout title="Crear cuenta">
    <div class="max-w-md mx-auto">
        <h1 class="text-xl font-semibold mb-6">Crear cuenta</h1>

        <livewire:account::register-form />

        <p class="mt-4 text-sm text-gray-500">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="underline">Inicia sesión</a>
        </p>
    </div>
</x-account::layout>
