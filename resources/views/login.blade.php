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
        <form method="post">
            @csrf

            <input type="text" name="email"/>
            <input type="password" name="password"/>

            <button type="submit">Login</button>
        </form>
    </body>
</html>