@extends('admin.templates.default')

@section('style_datatable')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content')
    <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
            <button class="btn btn-primary btn-sm" style="margin-bottom: 10px" data-toggle="modal" data-target="#catatan-pemasukan">
                <i class="fa fa-plus"></i> Catatan Pemasukan
            </button>

            <button class="btn btn-danger btn-sm" style="margin-bottom: 10px" data-toggle="modal" data-target="#catatan-pengeluaran">
                <i class="fa fa-minus"></i> Catatan Pengeluaran
            </button>

            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" />
            @endif

            {{--modal--}}
            <div class="modal fade" id="catatan-pemasukan">
                <form action="{{route('admin.keuangan.store')}}" method="post">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Catatan Pemasukan</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal_transaksi" value="{{old('tanggal_transaksi')}}">
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('tanggal_transaksi')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" placeholder="Nominal" name="nominal" value="{{old('nominal')}}">
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('nominal')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10" placeholder="Keterangan">{{old('keterangan')}}</textarea>
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('title')}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="jenis_catatan" value="pemasukan">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </form>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="catatan-pengeluaran">
                <form action="{{route('admin.keuangan.store')}}" method="post">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Catatan Pengeluaran</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal_transaksi" value="{{old('tanggal_transaksi')}}">
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('tanggal_transaksi')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" placeholder="Nominal" name="nominal" value="{{old('nominal')}}">
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('nominal')}}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10" placeholder="Keterangan">{{old('keterangan')}}</textarea>
                                    <div class="has-error">
                                        <span class="help-block">
                                            {{$errors->first('title')}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="jenis_catatan" value="pengeluaran">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </form>
                <!-- /.modal-dialog -->
            </div>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Saldo Akhir</th>
                    <th><i class="fa fa-bars"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dt)
                    <tr>
                        <td>{!!$dt->jenis_catatan == "pemasukan" ? "<small class='label label-success'><i class='fa fa-plus'></i></small>" : "<small class='label label-danger'><i class='fa fa-minus'></i></small>"!!}</td>
                        <td>{{$dt->tanggal_transaksi}}</td>
                        <td>{{$dt->keterangan}}</td>
                        <td>{{$dt->nominal}}</td>
                        <td>{{$dt->saldo}}</td>
{{--                        <td>{{$dt->created_at->format('d F, Y')}}</td>--}}
                        <td>
                            <form action="{{route('admin.news.destroy',[$dt->id])}}" class="d-inline" onsubmit="return confirm('Apakah anda ingin menghapus ini secara permanen ?')" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-app btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Created</th>
                    <th><i class="fa fa-bars"></i></th>
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
