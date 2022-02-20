@extends('admin::layout')

@section('content')

        <h1 class="text-2xl font-semibold text-gray-900">Users</h1>

        <x-data-table :datatable="$users">
            <x-slot name="columns">
                <x-dcolumn order="name">Name</x-dcolumn>
                <x-dcolumn order="email">Email</x-dcolumn>
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
