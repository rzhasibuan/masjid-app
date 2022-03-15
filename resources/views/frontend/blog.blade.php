<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{$data->title}}" />
    <meta name="author" content="{{$data->userNews->name}}" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="ENGLISH LECTURERS AND TEACHERS ASSOCIATION INDONESIA" /> <!-- website name -->
    <meta property="og:site" content="eltaorganization.org" /> <!-- website link -->
    <meta property="og:title" content="{{$data->title}}" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="ENGLISH LECTURERS AND TEACHERS ASSOCIATION | {{$data->title}}" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="{{$data->thumbnail}}" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="eltaorganization.org/blog/{{$data->slug}}" /> <!-- where do you want your post to link to -->
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
<header class="my-36 bg-blue-800">
    <div class="container px-4 sm:px-8 xl:px-4">
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->

<!-- Load Facebook SDK for JavaScript -->
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your share button code -->



<div class="share container px-4 sm:px-8 xl:px-4 ">
    <h1 class="my-4">{{$data->title}}</h1>
    <div>
        <small>Published {{$data->created_at->format('d F, Y, h:i:s A')}}</small> /
        <small>Updated {{$data->updated_at->format('d F, Y,  h:i:s A')}}</small>
{{--        <small>author : {{$data->userNews->name}}</small>--}}
    </div>
    <div class="flex items-center">
{{--        <span>Share : &nbsp;</span>--}}
        <div class="fb-share-button"
             data-href="https://www.eltaorganization.org/blog/{{$data->slug}}"
             data-layout="button_count">
        </div>
{{--        <a class="no-underline" href="#your-link">--}}
{{--            <i class="fab fa-facebook text-indigo-600 hover:text-pink-500 text-xl transition-all duration-200 mr-1.5"></i>--}}
{{--        </a>--}}
{{--        <a class="no-underline" href="#your-link">--}}
{{--            <i class="fab fa-twitter text-indigo-600 hover:text-pink-500 text-xl transition-all duration-200 mr-1.5"></i>--}}
{{--        </a>--}}
{{--        <a class="no-underline" href="#your-link">--}}
{{--            <i class="fab fa-whatsapp text-indigo-600 hover:text-pink-500 text-xl transition-all duration-200 mr-1.5"></i>--}}
{{--        </a>--}}
    </div>
</div>

<!-- Basic -->
<div class="ex-basic-1 py-12">
    <div class="container px-4 sm:px-8">
        <img class="inline mt-12 mb-4 object-cover object-cover h-96 w-full" src="{{asset('storage/'.$data->thumbnail)}}" alt="alternative" />
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->


<!-- Basic -->
<div class="ex-basic-1 pt-4">
    <div class="container px-4 sm:px-8 xl:px-32">
        <p class="mb-4">{!! $data->article !!}</p>
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->


<!-- news -->
<div class="my-5">
    @include('frontend.components.news')

</div>
<!-- end news -->


<!-- Footer -->
{{--@include('frontend.components.footer')--}}
<!-- end of footer -->


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
