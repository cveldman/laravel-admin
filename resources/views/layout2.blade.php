<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ mix('js/admin.js') }}" defer></script>

    <link rel="icon" href="data:,">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">

<div x-data="{ open: false }">
    @include('admin::layout.sidebar-mobile')
    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
        @include('admin::layout.sidebar')
    </div>

    <div class="md:pl-64 flex flex-col flex-1">
        @include('admin::layout.header')
        <main>
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
