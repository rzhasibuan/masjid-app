@extends('admin.templates.default')

@section('style_datatable')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content')
    <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
            <a href="{{route('admin.testimonials.create')}}" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="fa fa-pencil-square-o"></i> CREATE</button>
            </a>

            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif


            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Preview</th>
                    <th>Thumbnail</th>
                    <th>Qoute</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($data as $dt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <a href="{{route('admin.testimonials.edit',[$dt->id])}}" class="btn btn-app btn-sm">
                                <i class="fa fa-eye"></i> Show
                            </a>
                        </td>
                        <td>
                            <img src="{{asset('storage/'.$dt->thumbnail)}}" alt="" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{$dt->qoute}}</td>
                        <td>{{$dt->name}}</td>
                        <td>{{$dt->created_at->format('d F, Y')}}</td>

                        <td>
                            <form action="{{route('admin.testimonials.destroy',[$dt->id])}}" class="d-inline" onsubmit="return confirm('Apakah anda ingin menghapus ini secara permanen ?')" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-app btn-sm">
                                    <i class="fa fa-trash"></i>
                                    Trash
                                </button> <br>
                            </form>


                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Preview</th>
                    <th>Thumbnail</th>
                    <th>Qoute</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection


@section('js_datatable')


    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
