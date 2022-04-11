@extends('admin.templates.default')
@section('content')
<div class="card-body">
    <h3 class="text-left">Hallo, {{Auth()->user()->name}}</h3>
    @role('ketua','admin')
    <div class="row">
            <div class="col-lg-4 col-xs-6">
            <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                       @if(!$saldo == null)
                            <h3>Rp. {{number_format($saldo->saldo, 2)}}</h3>
                        @else
                            <h3>Rp. 0</h3>
                        @endif

                        <p>Total Saldo </p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                      <a href="{{route('admin.keuangan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        @if(!$saldo == null)
                            <h3>{{$kegiatan->count()}}</h3>
                        @else
                            <h3>0</h3>
                        @endif

                        <p>Jadwal pengajian </p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.kegiatan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        @if(!$saldo == null)
                            <h3>{{$bantuan->count()}}</h3>
                        @else
                            <h3>0</h3>
                        @endif

                        <p>Bantuan </p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-person-stalker"></i> --}}
                    </div>
                    <a href="{{route('admin.kegiatan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                       <h3>{{$users}}</h3>
                        <p>Tamir Masjid </p>
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
                        <p>Jabatan</p>
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
                <div class="small-box bg-red">
                    <div class="inner">
                       <h3>{{$about}}</h3>
                        <p>About</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-newspaper"></i> --}}
                    </div>
                   <a href="{{route('admin.about.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    @endrole

    @role('bendahara')
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                @if(!$saldo == null)
                    <h3>Rp. {{number_format($saldo->saldo, 2)}}</h3>
                @else
                    <h3>Rp. 0</h3>
                @endif

                <p>Total Saldo </p>
            </div>
            <div class="icon">
                {{-- <i class="ion ion-person-stalker"></i> --}}
            </div>
            <a href="{{route('admin.keuangan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    @endrole

    @role('pengurus')
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                @if(!$saldo == null)
                    <h3>{{$kegiatan->count()}}</h3>
                @else
                    <h3>0</h3>
                @endif

                <p>Jadwal pengajian </p>
            </div>
            <div class="icon">
                {{-- <i class="ion ion-person-stalker"></i> --}}
            </div>
            <a href="{{route('admin.kegiatan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                @if(!$saldo == null)
                    <h3>{{$bantuan->count()}}</h3>
                @else
                    <h3>0</h3>
                @endif

                <p>Bantuan </p>
            </div>
            <div class="icon">
                {{-- <i class="ion ion-person-stalker"></i> --}}
            </div>
            <a href="{{route('admin.kegiatan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
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
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$about}}</h3>
                <p>About</p>
            </div>
            <div class="icon">
                {{-- <i class="ion ion-newspaper"></i> --}}
            </div>
            <a href="{{route('admin.about.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
