<nav class="navbar fixed-top">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Image Logo -->
        <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline flex items-center text-white" href="/">
            <img src="{{asset('frontend/images/elta.png')}}" alt="alternative" class="h-8" />
        </a>

        <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center " id="navbarsExampleDefault">
            <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">

                <li>
                    <a class="nav-link page-scroll" href="#header">Home</a>
                </li>
                <li>
                    <a class="nav-link page-scroll" href="#about">About</a>
                </li>
                <li>
                    <a class="nav-link page-scroll" href="#features">Membership</a>
                </li>

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Publication</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="https://journal.eltaorganization.org">Journal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="https://journal.eltaorganization.org/index.php/joal">Journal of applied linguistics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="https://journal.eltaorganization.org/index.php/jcar">Journal of  Class Action Research</a>
                    </div>
                </li>
                <li>
                    <a class="nav-link page-scroll" href="https://api.whatsapp.com/send?phone=6282364268122&text=hai%20elta%20">Contact</a>
                </li>
            </ul>

        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
