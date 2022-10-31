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
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-form method="post">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <x-input type="text" name="email"/>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <x-input type="password" name="password"/>
                    </div>
                    @error('password')
                     <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit">Login</button>
            </x-form>
        </div>
    </body>
</html>