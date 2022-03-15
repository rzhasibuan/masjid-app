  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      @php
      $miniLogo = substr(config('app.name', 'Laravel'), 0,3);
      @endphp
      <!-- logo for regular state and mobile devices -->
      <span class="logo-mini">
        <b>{{$miniLogo}}</b>
      </span>
     <b> {{ substr(config('app.name', 'Laravel'),0,5) }}</b>{{ substr(config('app.name', 'Laravel'),5,4) }}
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          {{-- <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> --}}
          <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&color=7F9CF5&background=EBF4FF" class="user-image" alt="User Image">

                <span class="hidden-xs">{{auth()->user()->name}}</span>
                &nbsp;
                {{-- {{$title ?? ""}} --}}

              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                 <li class="user-header">
{{--                   <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&color=7F9CF5&background=EBF4FF" class="img-circle" alt="User Image">--}}

{{--                   <span>{{auth()->user()->name}}</span>--}}
                 </li>

                <li class="user-footer">
                    <a href="" class="btn btn-default btn-flat">Informasi Akun</a>
                    <br>
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
              </ul>
            </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
