@extends('admin.templates.default')

@section('content')
    <div class="box table-responsive no-padding">
        <div class="box-body">
            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="fa fa-plus"></i> Add permission</button>
            </a>
            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif

            <table id="permissiontable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>
                            <form action="{{ route('admin.permission.destroy', $permission->id) }}" method="post">
                                @method('DELETE') @csrf
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-info text-white">Edit</a>
                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $permissions->links() }}
        </div>
    </div>
@endsection
