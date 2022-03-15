<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->

            {{--dasbboard--}}
            <li class="{{$subDashboard ?? ""}}"><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            {{--membership--}}
            @role('user')
            {{-- <li class="{{$subDiagnosa ?? ""}}"><a href="{{url('/diagnosa')}}"><i class="fa fa-medkit"></i> <span>Diagnosa</span></a></li> --}}
            @endrole

            @role('superadmin','admin')
            <li class="{{$subCreateAtricle   ?? ""}} {{$subShowArticle   ?? ""}}  treeview">
                <a href=""><i class="fa fa-newspaper-o"></i> <span>News & article</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subCreateAtricle   ?? ""}}">
                        <a href="{{route('admin.news.create')}}" class="nav-link"><i class="fa fa-plus"></i><span>Create Article</span></a>
                    </li>
                    <li class="nav-item {{$subShowArticle   ?? ""}}">
                        <a href="{{route('admin.news.index')}}" class="nav-link"><i class="fa fa-newspaper-o"></i><span>Show Article</span></a>
                    </li>
                </ul>
            </li>
            {{--manajement akses--}}
            <li class="{{$subUser   ?? ""}} {{$subRole   ?? ""}} {{$subPermission   ?? ""}}  treeview">
                <a href=""><i class="fa fa-users"></i> <span>Access Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$subUser   ?? ""}}">
                        <a href="{{route('admin.user.index')}}" class="nav-link"><i class="fa fa-user"></i><span>User</span></a>
                    </li>
                    <li class="nav-item {{$subRole   ?? ""}}">
                        <a href="{{route('admin.role.index')}}" class="nav-link"><i class="fa fa-archive"></i><span>Role</span></a>
                    </li>
                    <li class="nav-item {{$subPermission   ?? ""}}">
                        <a href="{{route('admin.permission.index')}}" class="nav-link"><i class="fa fa-shield"></i><span>Permission</span></a>
                    </li>

                </ul>
            </li>
            {{--module--}}
            <li class="{{$subMenu   ?? ""}} {{$subHeader   ?? ""}} {{$subAboutMembership   ?? ""}} {{$subColaboration   ?? ""}} {{$subTestimonials   ?? ""}} {{$subAbout   ?? ""}} treeview">
                <a href=""><i class="fa fa-sliders"></i> <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
{{--                    <li class="nav-item {{$subMenu   ?? ""}}">--}}
{{--                        <a href="" class="nav-link"><i class="fa fa-bullseye"></i><span>Menu</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{$subHeader   ?? ""}}">
                        <a href="{{route('admin.header.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>Header</span></a>
                    </li>
                    <li class="nav-item {{$subAbout   ?? ""}}">
                        <a href="{{route('admin.about.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>About</span></a>
                    </li>
{{--                    <li class="nav-item {{$subAboutMembership   ?? ""}}">--}}
{{--                        <a href="{{route('admin.about-membership.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>About Membership</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{$subColaboration   ?? ""}}">
                        <a href="{{route('admin.colaboration.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>Colaboration</span></a>
                    </li>
                    <li class="nav-item {{$subTestimonials   ?? ""}}">
                        <a href="{{route('admin.testimonials.index')}}" class="nav-link"><i class="fa fa-bullseye"></i><span>Testimonials</span></a>
                    </li>
                </ul>

            </li>


            @endrole
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
