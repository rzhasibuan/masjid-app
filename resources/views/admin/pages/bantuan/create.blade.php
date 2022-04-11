@extends('admin.templates.default')

@section('style_datatable')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@endsection


@section('content')
    <div class="box box-primary">

    <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('admin.bantuan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" placeholder="judul kegiatan" name="judul" value="{{old('judul')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('judul')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pemberi">Pemberi bantuan</label>
                    <input type="text" class="form-control" id="pemberi" placeholder="Pemberi bantuan" name="pemberi" value="{{old('pemberi')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('pemberi')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="penerima">Penerima bantuan</label>
                    <input type="text" class="form-control" id="penerima" placeholder="Penerima bantuan" name="penerima" value="{{old('penerima')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('penerima')}}
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tanggal_ambil">Tanggal Ambil</label>
                    <input type="date" class="form-control" id="tanggal_ambil" placeholder="Tanggal Ambil" name="tanggal_ambil" value="{{old('tanggal_ambil')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('tanggal_ambil')}}
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_akhir" placeholder="Tanggal akhir" name="tanggal_akhir" value="{{old('tanggal_akhir')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('tanggal_akhir')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi" value="{{old('lokasi')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('lokasi')}}
                        </span>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">simpan</button>
                    <a href="{{route('admin.bantuan.index')}}" class="btn btn-danger">batal</a>
                </div>
        </form>
    </div>
@endsection

