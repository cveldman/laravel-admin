@extends('admin::layout')

@section('content')

    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <section aria-labelledby="payment-details-heading">
            <x-form action="{{ route('admin.users.update', $user) }}" method="put">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Account
                                details</h2>
                            <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that
                                updating your location could affect your tax rates.</p>
                        </div>

                        <div>
                            <x-label for="name" class="mb-1">{{ __('Name') }}</x-label>
                            <x-input name="name" :value="$user->name" autocomplete="name" autofocus/>
                            <x-error name="name"/>
                        </div>
                    </div>
                </div>

                <div x-data='{ roles: @json($user->roles->map(function($item) { return (string) $item->id; })) }' class="shadow sm:rounded-md sm:overflow-hidden mt-4">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Rollen & permissies</h2>
                            <p class="mt-1 text-sm text-gray-500">Misschien extra permission voor veranderen van gebruikers permissies, dan voorkom je
                                dat iemand als simpele gebruiker een admin gebruiker kan aanmaken.</p>
                        </div>

                        <div class="grid grid-cols-4 mt-4">
                            @foreach($roles as $role)
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input x-model="roles" value="{{ $role->id }}" id="role-{{ $role->id }}"
                                               aria-describedby="role-{{ $role->id }}-description" name="roles[]"
                                               type="checkbox"
                                               @checked(in_array($role->id, old('roles', $user->roles()->pluck('id')->toArray())))
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="role-{{ $role->id }}" class="font-medium text-gray-700">{{ $role->name }}</label>
                                        <p id="role-{{ $role->id }}-description" class="text-gray-500">{{ $role->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <x-error name="roles"/>
                        </div>

                        <div class="grid grid-cols-4 mt-4">
                            @foreach($permissions as $permission)
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input
                                                x-bind:disabled='@json($permission->disabled).some(i => roles.includes(i))'
                                                id="permission-{{ $permission->id }}"
                                                @checked(in_array($permission->id, old('permissions', $user->permissions()->pluck('id')->toArray())))
                                                aria-describedby="permission-{{ $permission->id }}-description" name="permissions[]"
                                                value="{{ $permission->id }}" type="checkbox"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded disabled:bg-slate-200 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="permission-{{ $permission->id }}" class="font-medium text-gray-700">{{ $permission->name }}</label>
                                        <p id="permission-{{ $permission->id }}-description" class="text-gray-500">{{ $permission->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <x-error name="permissions"/>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">{{ __('Save') }}</button>
                    </div>
                </div>
            </x-form>
        </section>
    </div>

@endsection
