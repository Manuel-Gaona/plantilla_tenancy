<x-account::layout title="Verifica tu email">
    <h1 class="text-xl font-semibold mb-6">Verifica tu email</h1>

    <p class="text-sm text-gray-600 mb-4">
        Te enviamos un enlace de verificación a tu correo. Si no lo recibiste, puedes pedir uno nuevo.
    </p>

    @if (session('status') === 'verification-link-sent')
        <p class="mb-4 text-sm text-green-600">Se envió un nuevo enlace de verificación.</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="w-full rounded bg-gray-900 text-white py-2">
            Reenviar enlace de verificación
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="text-sm underline">Cerrar sesión</button>
    </form>
</x-account::layout>
