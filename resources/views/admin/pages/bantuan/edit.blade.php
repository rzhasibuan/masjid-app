@extends('admin.templates.default')

@section('style_datatable')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection


@section('content')
    <div class="box box-primary">


        @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')" />
        @endif

        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('admin.bantuan.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="box-body">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" placeholder="judul kegiatan" name="judul" value="{{$data->judul}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('judul')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pemberi">Pemberi bantuan</label>
                    <input type="text" class="form-control" id="pemberi" placeholder="Pemberi bantuan" name="pemberi" value="{{$data->pemberi}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('pemberi')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="penerima">Penerima bantuan</label>
                    <input type="text" class="form-control" id="penerima" placeholder="Penerima bantuan" name="penerima" value="{{$data->penerima}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('penerima')}}
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tanggal_ambil">Tanggal Ambil</label>
                    <input type="date" class="form-control" id="tanggal_ambil" placeholder="Tanggal Ambil" name="tanggal_ambil" value="{{$data->tanggal_ambil}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('tanggal_ambil')}}
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_akhir" placeholder="Tanggal akhir" name="tanggal_akhir" value="{{$data->tanggal_akhir}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('tanggal_akhir')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi" value="{{$data->lokasi}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('lokasi')}}
                        </span>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('admin.bantuan.index')}}" class="btn btn-danger">Cancel</a>
                </div>
        </form>
    </div>
@endsection


@section('js_datatable')
    <!-- CK Editor -->
    <script src="{{asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>


    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('article',{
                filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod : 'form',
            })
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
