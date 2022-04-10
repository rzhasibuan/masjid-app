<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{$title ?? ""}}" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="{{$title ?? ""}}" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="{{$title ?? ""}}" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="{{$title ?? ""}}" /> <!-- description shown in the actual shared post -->
    <meta property="og:url" content="{{$title ?? ""}}" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Masjid Al Fath | {{$title ?? ""}}</title>

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
<nav class="navbar fixed-top shadow-sm">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Image Logo -->
        <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline flex items-center text-green-600" href="/">
            Masjid Al Fath
        </a>

        <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
        </button>


    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->

<!-- Header -->
<div class="wrapper h-screen">
    <header class="my-32">
        <div class="container px-4 sm:px-8 xl:px-4">
            <h2 class="text-gray-500 text-center">JADWAL KEGIATAN DAN PENGAJIAN</h2>
            {{--        <hr>--}}
            <div class="max-w-7xl mx-auto grid lg:grid-cols-3 grid-cols-1 gap-3 my-10 lg:p-0 p-10">
                @foreach($kegiatan as $data)
                    <a href="{{route('frontend.kegiatan', $data->slug)}}">
                        <div class="rounded-lg overflow-hidden shadow-sm lg:my-3 my-4 mx-4 hover:shadow-xl transition duration-150 w-100"
                             data-aos="fade-up"
                             data-aos-offset="100"
                             data-aos-duration="1000">
                            {{--                    <img src="{{asset('storage/'.$data->thumbnail)}}" alt="{{$data->title}}"  class="object-cover h-52 w-96">--}}
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2 text-gray-500">{{$data->judul}}</div>

                                <p class="card-text text-gray-400"><small class="text-muted">Tanggal mulai pada {{$data->tanggal_mulai}} pukul {{$data->jam_mulai}} WIB s/d {{$data->tanggal_akhir}} pukul {{$data->jam_akhir}} WIB</small></p>
                                <p class="card-text text-gray-400"><small class="text-muted">Lokasi:  {{$data->lokasi}}</small></p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </header>
</div>


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
