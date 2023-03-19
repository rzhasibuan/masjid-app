<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->

            {{--dasbboard--}}
            <li class="{{$subDashboard ?? ""}}"><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            @role('ketua')
            {{--module keuangan--}}
            <li class="{{$subKeuangan   ?? ""}} {{$subKeuanganLaporan   ?? ""}}  treeview">
                <a href=""><i class="fa fa-money"></i> <span>Keuangan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subKeuangan   ?? ""}}">
                        <a href="{{route('admin.keuangan.index')}}" class="nav-link"><i class="fa fa-plus"></i><span>Kas Masjid</span></a>
                    </li>
                    <li class="nav-item {{$subKeuanganLaporan   ?? ""}}">
                        <a href="{{route('admin.laporan.kas')}}" class="nav-link"><i class="fa fa-newspaper-o"></i><span>Laporan</span></a>
                    </li>
                </ul>
            </li>

            {{--kegiatan masjid--}}
            <li class="{{$subKegiatanCreate   ?? ""}} {{$subKegiatan   ?? ""}}  treeview">
                <a href=""><i class="fa fa-calendar-check-o"></i> <span>Jadwal kegiatan pengajian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="nav-item {{$subKegiatan   ?? ""}}">
                        <a href="{{route('admin.kegiatan.index')}}" class="nav-link"><i class="fa fa-calendar-check-o"></i><span>Daftar Kegiatan</span></a>
                    </li>
                    <li class="nav-item {{$subKegiatanCreate   ?? ""}}">
                        <a href="{{route('admin.kegiatan.create')}}" class="nav-link"><i class="fa fa-calendar-plus-o"></i><span>Tambah Kegiatan</span></a>
                    </li>
                </ul>
            </li>

            {{--bantuan masjid--}}
            <li class="{{$subBantuan   ?? ""}}  treeview">
                <a href=""><i class="fa  fa-heartbeat"></i> <span>Bantuan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subBantuan   ?? ""}}">
                        <a href="{{route('admin.bantuan.index')}}" class="nav-link"><i class="fa fa-calendar-check-o"></i><span>Daftar Bantuan</span></a>
                    </li>
                </ul>
            </li>

            {{--manajement akses--}}
            <li class="{{$subUser   ?? ""}} {{$subRole   ?? ""}} {{$subPermission   ?? ""}}  treeview">
                <a href=""><i class="fa fa-users"></i> <span>Ta'mir Masjid</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subUser   ?? ""}}">
                        <a href="{{route('admin.user.index')}}" class="nav-link"><i class="fa fa-user"></i><span>Anggota</span></a>
                    </li>
                    <li class="nav-item {{$subRole   ?? ""}}">
                        <a href="{{route('admin.role.index')}}" class="nav-link"><i class="fa fa-archive"></i><span>Jabatan</span></a>
                    </li>
                </ul>
            </li>

            {{--module Pengaturan--}}
            <li class="{{$subMenu   ?? ""}} {{$subHeader   ?? ""}} {{$subAboutMembership   ?? ""}} {{$subColaboration   ?? ""}} {{$subTestimonials   ?? ""}} {{$subAbout   ?? ""}} treeview">
                <a href=""><i class="fa fa-sliders"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subHeader   ?? ""}}">
                        <a href="{{route('admin.header.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>Slider</span></a>
                    </li>
                    <li class="nav-item {{$subAbout   ?? ""}}">
                        <a href="{{route('admin.about.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>About</span></a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('bendahara')
            <li class="{{$subKeuangan   ?? ""}} {{$subKeuanganLaporan   ?? ""}}  treeview">
                <a href=""><i class="fa fa-money"></i> <span>Keuangan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subKeuangan   ?? ""}}">
                        <a href="{{route('admin.keuangan.index')}}" class="nav-link"><i class="fa fa-plus"></i><span>Kas Masjid</span></a>
                    </li>
                    <li class="nav-item {{$subKeuanganLaporan   ?? ""}}">
                        <a href="{{route('admin.laporan.kas')}}" class="nav-link"><i class="fa fa-newspaper-o"></i><span>Laporan</span></a>
                    </li>
                </ul>
            </li>
            @endrole

            @role('pengurus')
            {{--kegiatan masjid--}}
            <li class="{{$subKegiatanCreate   ?? ""}} {{$subKegiatan   ?? ""}}  treeview">
                <a href=""><i class="fa fa-calendar-check-o"></i> <span>Jadwal kegiatan pengajian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="nav-item {{$subKegiatan   ?? ""}}">
                        <a href="{{route('admin.kegiatan.index')}}" class="nav-link"><i class="fa fa-calendar-check-o"></i><span>Daftar Kegiatan</span></a>
                    </li>
                    <li class="nav-item {{$subKegiatanCreate   ?? ""}}">
                        <a href="{{route('admin.kegiatan.create')}}" class="nav-link"><i class="fa fa-calendar-plus-o"></i><span>Tambah Kegiatan</span></a>
                    </li>
                </ul>
            </li>

            {{--bantuan masjid--}}
            <li class="{{$subBantuan   ?? ""}}  treeview">
                <a href=""><i class="fa  fa-heartbeat"></i> <span>Bantuan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subBantuan   ?? ""}}">
                        <a href="{{route('admin.bantuan.index')}}" class="nav-link"><i class="fa fa-calendar-check-o"></i><span>Daftar Bantuan</span></a>
                    </li>
                </ul>
            </li>
            {{--module Pengaturan--}}
            <li class="{{$subMenu   ?? ""}} {{$subHeader   ?? ""}} {{$subAboutMembership   ?? ""}} {{$subColaboration   ?? ""}} {{$subTestimonials   ?? ""}} {{$subAbout   ?? ""}} treeview">
                <a href=""><i class="fa fa-sliders"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subHeader   ?? ""}}">
                        <a href="{{route('admin.header.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>Slider</span></a>
                    </li>
                    <li class="nav-item {{$subAbout   ?? ""}}">
                        <a href="{{route('admin.about.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>About</span></a>
                    </li>
                </ul>
            </li>

            @endrole
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
