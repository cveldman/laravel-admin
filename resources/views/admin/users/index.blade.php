@extends('admin::layout')

@section('content')

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('admin::users.title') }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ __('admin::users.description') }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.users.create') }}" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Add user
            </a>
        </div>
    </div>

    <x-data-table :datatable="$users" class="mt-8">
        <x-slot name="columns">
            <x-dcolumn order="name">Name</x-dcolumn>
            <x-dcolumn order="email">Email</x-dcolumn>
            <x-dcolumn></x-dcolumn>
        </x-slot>
        @foreach($users as $user)
            <x-row>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a>
                </td>

                <x-cell>{{ $user->email }}</x-cell>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    @can('update', $user)
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    @endcan

                    @can('delete', $user)
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    @endcan
                </td>
            </x-row>
        @endforeach
    </x-data-table>

@endsection
