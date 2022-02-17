@extends('admin::layout')

@section('content')
    <x-form action="{{ route('admin.users.update', $user) }}" method="put">
        <x-input type="text" name="name" :value="$user->name"></x-input>
        <x-button type="submit"></x-button>
    </x-form>
@endsection
