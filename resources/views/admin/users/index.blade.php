@extends('admin::layout')

@section('content')

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-end">{{ __('Create') }}</a>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Created At') }}</th>
                        <th scope="col">{{ __('Updated At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user) }}">{{ __('Update') }}</a>
                                    <a href="{{ route('admin.users.destroy', $user) }}">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="align-middle text-center" style="height: 250px;">{{ __('table.empty') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
