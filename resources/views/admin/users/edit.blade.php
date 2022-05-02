@extends('admin::layout')

@section('content')

    <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <section aria-labelledby="payment-details-heading">
            <x-form action="{{ route('admin.users.update', $user) }}" method="put">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-gray-900">Account details</h2>
                            <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-4">
                                <x-label for="name" class="mb-1">{{ __('Name') }}</x-label>
                                <x-input name="name" :value="$user->name" autocomplete="name" autofocus/>
                                <x-error name="name"/>
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="roles" class="block text-sm font-medium text-gray-700">{{ __('Roles') }}</label>
                                <select name="roles[]" id="roles" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" multiple>
                                    @foreach ($roles as $k => $v)
                                        <option value="{{ $k }}" @selected(in_array($k, old('roles', $user->roles()->pluck('id')->toArray())))>
                                            {{ $v }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-error name="roles"/>
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label for="permissions" class="block text-sm font-medium text-gray-700">{{ __('Permissions') }}</label>
                                <select name="permissions[]" id="permissions" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" multiple>
                                    @foreach ($permissions as $k => $v)
                                        <option value="{{ $k }}" @selected(in_array($k, old('permissions', $user->permissions()->pluck('id')->toArray())))>
                                            {{ $v }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-error name="permissions"/>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">{{ __('Save') }}</button>
                    </div>
                </div>
            </x-form>
        </section>
    </div>

@endsection
