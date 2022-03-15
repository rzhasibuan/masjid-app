@extends('admin.templates.default')

@section('content')
    <div class="box table-responsive no-padding">
        <div class="box-body">
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="fa fa-plus"></i> Add role</button>
            </a>
            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif

            <table id="roletable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            <form action="{{ route('admin.role.destroy', $role->id) }}" method="post">
                                @method('DELETE') @csrf
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-info text-white">Edit</a>
                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                {{ $roles->links() }}
        </div>
    </div>
@endsection
