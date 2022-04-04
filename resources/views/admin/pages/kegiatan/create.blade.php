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

    <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('admin.kegiatan.store')}}" method="post" enctype="multipart/form-data">
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
                    <textarea name="deskripsi" id="article" cols="60" rows="10">{{old('deskripsi')}}</textarea>
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('deskripsi')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="title" placeholder="Tanggal mulai" name="tanggal_mulai" value="{{old('tanggal_mulai')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('tanggal_mulai')}}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" placeholder="Jam mulai" name="jam_mulai" value="{{old('jam_mulai')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('jam_mulai')}}
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
                    <label for="jam_akhir">Jam Akhir</label>
                    <input type="time" class="form-control" id="jam_akhir" placeholder="Jam akhir" name="jam_akhir" value="{{old('jam_akhir')}}">
                    <div class="has-error">
                        <span class="help-block">
                            {{$errors->first('jam_akhir')}}
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

                <div class="form-group">
                    <label>Published</label>
                    <select class="form-control select2" style="width: 100%;" name="published">
                        <option selected disabled>Select Option</option>
                        <option value=1>publish</option>
                        <option value=0>draf</option>
                    </select>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('published')}}
                    </span>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">simpan</button>
                    <a href="{{route('admin.news.index')}}" class="btn btn-danger">batal</a>
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
