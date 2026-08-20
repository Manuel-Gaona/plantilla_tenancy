<x-account::layout title="Iniciar sesión">
    <div class="max-w-md mx-auto">
        <h1 class="text-xl font-semibold mb-6">Iniciar sesión</h1>

        <livewire:account::login-form />

        <p class="mt-4 text-sm text-gray-500">
            ¿No tienes cuenta? <a href="{{ route('register') }}" class="underline">Regístrate</a>
        </p>
    </div>
</x-account::layout>
