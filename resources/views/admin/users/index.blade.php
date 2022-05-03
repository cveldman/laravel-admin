@extends('admin::layout')

@section('content')

    <!-- <div class="px-4 sm:px-6 lg:px-8"> -->
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('admin::users.title') }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ __('admin::users.description') }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.users.create') }}" type="button"
               class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                {{ __('Add :resource', ['resource' => __('admin::users.resource')]) }}
            </a>
        </div>
    </div>

    <!-- mb-4 nodig voor pagination links -->
    <x-table :columns="['Name', 'Email', 'Roles', '']" class="mb-4">
        @foreach($users as $user)
            <tr>
                <x-td class="pl-4 pr-3 font-medium text-gray-900 sm:pl-6">{{ $user->name }}</x-td>
                <x-td class="px-3 text-gray-500">{{ $user->email }}</x-td>
                <x-td class="px-3 text-gray-500">{{ $user->roles->implode('name', ', ') }}</x-td>
                <x-td class="relative pl-3 pr-4 text-right font-medium sm:pr-6">
                    @can('update', $user)
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="text-indigo-600 hover:text-indigo-900">
                            {{ __('Edit') }}
                        </a>
                    @endcan

                    @can('delete', $user)
                        <a href="{{ route('admin.users.destroy', $user) }}"
                           class="text-indigo-600 hover:text-indigo-900"
                           onclick="return confirm('weet je het zeker?')">
                            {{ __('Delete') }}
                        </a>
                    @endcan
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $users->links() }}

@endsection
