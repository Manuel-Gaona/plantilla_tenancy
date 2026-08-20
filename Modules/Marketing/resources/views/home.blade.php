<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex items-center justify-center bg-white text-gray-900">
        <div class="text-center">
            <h1 class="text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>
            <p class="mt-2 text-gray-500">Marketing module — placeholder home.</p>
        </div>
    </body>
</html>
