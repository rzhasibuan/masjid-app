@extends('admin.templates.default')

@section('content')
    <div class="box table-responsive no-padding">
        <div class="box-body">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="fa fa-plus"></i> Tambah Anggota </button>
            </a>

            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')"/>
            @endif

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->display_name}}
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                @method('DELETE') @csrf
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info text-white">ubah</a>
                                    <button type="submit" class="btn btn-danger text-white">hapus</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}

        </div>
        <!-- /.box-body -->
    </div>
@endsection
