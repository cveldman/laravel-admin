<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="{{ mix('js/admin.js') }}" defer></script>

        <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
        <script src="//unpkg.com/alpinejs" defer></script>

        @livewireStyles
    </head>
    <body class="h-full">
        <x-form method="post">
            @csrf

            <x-input type="text" name="email" autocomplete="username"/>
            <x-input type="password" name="password" autocomplete="password"/>

            <button type="submit">Login</button>
        </x-form>
    </body>
</html>