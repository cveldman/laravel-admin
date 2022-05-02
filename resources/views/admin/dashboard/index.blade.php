@extends('admin::layout')

@section('content')

    {{ auth()->user()->name }}

@endsection