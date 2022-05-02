@extends('admin::layout')

@section('content')

    <!-- <div class="px-4 sm:px-6 lg:px-8"> -->
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ __('admin::users.title') }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ __('admin::users.description') }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.users.create') }}" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                {{ __('Add :resource', ['resource' => __('admin::users.resource')]) }}
            </a>
        </div>
    </div>
    <!-- mb-4 voor de pagination links -->
    <div class="mt-8 mb-5 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('Name') }}</th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Email') }}</th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Roles') }}</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">{{ __('Edit') }}</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($users as $user)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    @can('view', $user)
                                        <a href="{{ route('admin.users.show', $user) }}">
                                            {{ $user->name }}
                                        </a>
                                    @else
                                        {{ $user->name }}
                                    @endcan
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->roles->implode('name', ', ') }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                    @endcan
                                    &nbsp;
                                    @can('delete', $user)
                                        <a href="{{ route('admin.users.destroy', $user) }}"
                                           class="text-indigo-600 hover:text-indigo-900">{{ __('Delete') }}</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $users->links() }}

    <!-- </div> -->

@endsection
