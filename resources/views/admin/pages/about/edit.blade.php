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
        <form action="{{route('admin.about.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="box-body">

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail">

                    <br>
                    <img src="{{asset('storage/'.$data->thumbnail)}}" alt="{{$data->title}}" width="300px" class="img-thumbnail">

                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('thumbnail')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="please type description" name="description" value="{{$data->description}}">
                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('description')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="text" id="text" cols="60" rows="10">{{$data->text}}</textarea>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('text')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_rekening">No Rekening </label>
                    <input type="text" class="form-control" id="no_rekening" placeholder="please insert rekening number" name="no_rekening" value="{{$data->no_rekening}}">
                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('no_rekening')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_whatsapp">No WhatsApp </label>
                    <input type="text" class="form-control" id="no_whatsapp" placeholder="please insert whatsapp number" name="no_whatsapp" value="{{$data->no_whatsapp}}">
                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('no_whatsapp')}}
                    </span>
                    </div>
                </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{url('/home')}}" class="btn btn-danger">Cancel</a>
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
            CKEDITOR.replace('text',{
                filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod : 'form',
            })
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
