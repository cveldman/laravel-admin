@extends('admin::layout')

@section('content')

    <a href="{{ route('admin.user-groups.create') }}" class="btn btn-primary float-end">{{ __('Create') }}</a>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Created At') }}</th>
                        <th scope="col">{{ __('Updated At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($groups) > 0)
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.user-groups.edit', $group) }}">{{ __('Update') }}</a>
                                    <a href="{{ route('admin.user-groups.destroy', $group) }}">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="align-middle text-center" style="height: 250px;">{{ __('table.empty') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
