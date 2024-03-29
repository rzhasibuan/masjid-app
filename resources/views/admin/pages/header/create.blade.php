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
        <form action="{{route('admin.header.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Big Title</label>
                    <input type="text" class="form-control" id="Bigtitle" placeholder="please type big title" name="bigTitle" value="{{old('bigTitle')}}">
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('bigTitle')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail">
                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('thumbnail')}}
                    </span>
                    </div>
                </div>


                <div class="form-group">
                    <textarea name="text" id="text" cols="60" rows="10">{{old('text')}}</textarea>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('text')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="linkButton">Link Button</label>
                    <input type="url" class="form-control" id="linkButton" placeholder="please type link button" name="linkButton" value="{{old('linkButton')}}">
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('linkButton')}}
                    </span>
                    </div>
                </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
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
            {{--CKEDITOR.replace('text',{--}}
            {{--    filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",--}}
            {{--    filebrowserUploadMethod : 'form',--}}
            {{--})--}}
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
