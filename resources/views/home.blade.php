@extends('admin.templates.default')
@section('content')
<div class="card-body">
    <h3 class="text-left">Hallo, {{Auth()->user()->name}}</h3>
    @role('superadmin','admin')
    <div class="row">

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                       <h3>{{$users}}</h3>
                        <p>User Management</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                       <h3>{{$users}}</h3>
                        <p>Role Management</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                       <h3>{{$permission}}</h3>
                        <p>Permission</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                       <h3>{{$collaboration}}</h3>
                        <p>Collaboration</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                       <h3>{{$testimonials}}</h3>
                        <p>Tersimonials</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                       <h3>{{$header}}</h3>
                        <p>Header</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                       <h3>{{$news}}</h3>
                        <p>News / Articles</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-newspaper"></i> --}}
                    </div>
                   <a href="{{route('admin.news.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                       <h3>{{$about}}</h3>
                        <p>About</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-newspaper"></i> --}}
                    </div>
                   <a href="{{route('admin.news.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    @endrole
    @role('user')
    <div class="box box-solid bg-teal-gradient">
        <div class="box-body">
            <h5 class="text-center">Berikut hasil diagnosa anda</h5>
        </div>
        <div class="box-footer no-border">
            <div class="row">
                 <div class="col-xs-4 col-lg-12 text-center">
{{--                     @if($statusPasien->value == null)--}}
{{--                         <input type="text" class="knob" data-readonly="true" value="0" data-width="100" data-height="100"--}}
{{--                                data-fgColor="red">--}}
{{--                     @else--}}
{{--                         <input type="text" class="knob" data-readonly="true" value="{{$statusPasien->value}}" data-width="100" data-height="100"--}}
{{--                                data-fgColor="red">--}}
{{--                     @endif--}}
{{--                     @if($statusPasien->status == null)--}}
{{--                         <div class="knob-label">Belum di diagnosa</div>--}}
{{--                     @else--}}
{{--                         <div class="knob-label">{{$statusPasien->status}}</div>--}}
{{--                     @endif--}}
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    @endrole
</div>
@endsection

@section('graph')
<!-- Morris.js charts -->
<script src="{{asset('assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->

@endsection
