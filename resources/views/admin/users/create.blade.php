@extends('admin::layout')

@section('content')
    <x-form action="{{ route('admin.users.store') }}" method="post">
        <x-input type="text" name="name"></x-input>
        <x-input type="text" name="email"></x-input>
        <x-button type="submit"></x-button>
    </x-form>
@endsection
