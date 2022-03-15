<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="ELTA | ENGLISH LECTURERS AND TEACHERS ASSOCIATION" />
    <meta name="author" content="elta" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="ELTA | ENGLISH LECTURERS AND TEACHERS ASSOCIATION" /> <!-- website name -->
    <meta property="og:site" content="eltaorganization.org" /> <!-- website link -->
    <meta property="og:title" content="elta indonesia" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="elta indonesia, join membership, learn english" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="{{asset('frontend/images/elta.png')}}" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="eltaorganization.org" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Elta | English Lecturers and teachers association</title>

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
@include('frontend.components.nav')
<!-- end of navigation -->

<!-- Header -->
@include('frontend.components.header')
<!-- end of header -->
<!-- waveas -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1e40af" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,208C640,203,800,181,960,176C1120,171,1280,181,1360,186.7L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
<!-- end waves -->
<!-- about -->
@include('frontend.components.about')
<!-- end about -->

<!-- Features -->
@include('frontend.components.features')
<!-- end of cards-1 -->
<!-- end of features -->
<!-- waves -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#60a5fa" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,208C640,203,800,181,960,176C1120,171,1280,181,1360,186.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
<!-- end waves -->
<!-- Collaboration with  -->
@include('frontend.components.collaboration')
<!-- end Collaboration with  -->
<!-- waves -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#60a5fa" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,208C640,203,800,181,960,176C1120,171,1280,181,1360,186.7L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
<!-- end waves -->

<!-- Testimonials -->
@include('frontend.components.testimonials')
<!-- end of testimonials -->

<!-- news -->
@include('frontend.components.news')
<!-- end news -->


<!-- Footer -->
@include('frontend.components.footer')
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
