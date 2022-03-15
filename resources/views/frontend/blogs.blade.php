<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="ENGLISH LECTURERS AND TEACHERS ASSOCIATION INDONESIA" /> <!-- website name -->
    <meta property="og:site" content="eltaorganization.org" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="ENGLISH LECTURERS AND TEACHERS ASSOCIATION | " /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="eltaorganization.org/blog" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>ELTA | ENGLISH LECTURERS AND TEACHERS ASSOCIATION | {{$title ?? ""}}</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
    <link href="{{asset('frontend/css/fontawesome-all.css')}}" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="{{asset('frontend/css/swiper.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('frontend/images/elta.png')}}" />
</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Navigation -->
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
                    <a class="nav-link page-scroll" href="{{ route('frontend.index') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link page-scroll" href="{{ route('frontend.about') }}">About</a>
                </li>
                <li>
                    <a class="nav-link page-scroll" href="https://docs.google.com/forms/d/e/1FAIpQLSehnmnamsPlJx9cZZOxtJ8Xv8l0mw6d_KdjlY08hs3V_ABCnA/viewform?c=0&w=1">Membership</a>
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
</nav>
<!-- end of navigation -->

<!-- Header -->
<header class="my-36">
    <div class="container px-4 sm:px-8 xl:px-4">
        <h2 class="text-gray-500 text-center">News, infromation & articles</h2>
{{--        <hr>--}}
        <div class="max-w-7xl mx-auto grid lg:grid-cols-3 grid-cols-1 gap-3 my-10 lg:p-0 p-10">
            @foreach($news as $news)
                <a href="{{route('frontend.blog', $news->slug)}}">
                    <div class="rounded-lg overflow-hidden shadow-sm mx-4 lg:my-0 my-4 hover:shadow-xl transition duration-150 w-50"
                         data-aos="fade-up"
                         data-aos-offset="100"
                         data-aos-duration="1000">
                        <img src="{{asset('storage/'.$news->thumbnail)}}" alt="{{$news->title}}"  class="object-cover h-52 w-96">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{$news->title}}</div>
                            <p class="card-text"><small class="text-muted">Publish {{$news->created_at->format('d M, Y')}}</small></p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$news->category}}</span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</header>


<!-- Copyright -->
@include('frontend.components.copyright')
<!-- end of copyright -->

<!-- Scripts -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script> <!-- jQuery for JavaScript plugins -->
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{asset('frontend/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
<script src="{{asset('frontend/js/scripts.js')}}"></script> <!-- Custom scripts -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
