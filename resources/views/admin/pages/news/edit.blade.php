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
        <form action="{{route('admin.news.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="please type title" name="title" value="{{$data->title}}">
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('title')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" style="width: 100%;" name="category">
                        <option selected disabled>Select category</option>
                        @if($data->category == "news")
                        <option value="news" selected>news</option>
                        <option value="information">information</option>
                        <option value="articles">articles</option>
                        @elseif($data->category == "information")
                        <option value="news">news</option>
                        <option value="information" selected>information</option>
                        <option value="articles">articles</option>
                        @else
                        <option value="news">news</option>
                        <option value="information">information</option>
                        <option value="articles" selected>articles</option>
                        @endif

                    </select>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('category')}}
                    </span>
                    </div>
                </div>

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
                    {{--                    <label for="article">article</label>--}}
                    <textarea name="article" id="article" cols="60" rows="10">{{$data->article}}</textarea>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('article')}}
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Published</label>
                    <select class="form-control select2" style="width: 100%;" name="published">
                        <option selected disabled>Select Option</option>
                        @if($data->published === 1)
                            <option value=1 selected>publish</option>
                            <option value=0>draf</option>
                        @else
                            <option value=1>publish</option>
                            <option value=0 selected>draf</option>
                        @endif
                    </select>
                    <div class="has-error">
                    <span class="help-block">
                        {{$errors->first('published')}}
                    </span>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('admin.news.index')}}" class="btn btn-danger">Cancel</a>
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
