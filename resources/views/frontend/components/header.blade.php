<header id="header" class="header text-center lg:text-left ">
{{--    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">--}}
{{--        <div class="mb-16 lg:mt-8 xl:mt-3 xl:mr-12 item-aos"--}}
{{--             data-aos="fade-up"--}}
{{--             data-aos-offset="100"--}}
{{--             data-aos-duration="1000">--}}
{{--            <h1 class="h1-large mb-5 text-green-600">{{$header->bigtitle ?? ""}}</h1>--}}
{{--            <p class="p-large mb-8 text-green-500">{!! $header->text ?? "" !!}</p>--}}
{{--            <a class="hover:bg-green-100 py-2 px-4 rounded-full hover:text-gray-700 hover:shadow-xl bg-green-500 text-white" href="{{$header->linkButton ?? ""}}">Tentang Kami</a>--}}
{{--        </div>--}}
{{--        <div class="xl:text-right item-aos"--}}
{{--             data-aos="fade-up"--}}
{{--             data-aos-offset="100"--}}
{{--             data-aos-duration="1000">--}}
{{--            <img class="inline rounded-xl " src="{{asset('storage/')}}/{{$header->thumbnail ?? ""}}" alt="Masjid Al Fath" />--}}
{{--        </div>--}}
{{--    </div> <!-- end of container -->--}}

{{--    <div class="swiper mySwiper">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            <div class="swiper-slide slide_1">Slide 1</div>--}}
{{--            <div class="swiper-slide slide_2">Slide 2</div>--}}
{{--            <div class="swiper-slide slide_3">Slide 3</div>--}}
{{--            <div class="swiper-slide slide_4">Slide 4</div>--}}
{{--            <div class="swiper-slide slide_5">Slide 5</div>--}}
{{--        </div>--}}
{{--    </div>--}}

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($header as $data)
                    <div class="swiper-slide">
                        <img data-src=" {{ asset('storage/')}}/{{$data->thumbnail ?? "https://images.pexels.com/photos/1824273/pexels-photo-1824273.jpeg?cs=srgb&dl=pexels-victor-miyata-1824273.jpg&fm=jpg"}}"
                             class="swiper-lazy"/>
                    </div>
                @endforeach

{{--                <div class="swiper-slide">--}}
{{--                    <img data-src="https://images.pexels.com/photos/3219549/pexels-photo-3219549.jpeg?cs=srgb&dl=pexels-engin-akyurt-3219549.jpg&fm=jpg"--}}
{{--                         class="swiper-lazy"/>--}}
{{--                </div>--}}
{{--                <div class="swiper-slide">--}}
{{--                    <img data-src="https://images.pexels.com/photos/1579240/pexels-photo-1579240.jpeg?cs=srgb&dl=pexels-stas-knop-1579240.jpg&fm=jpg"--}}
{{--                         class="swiper-lazy"/>--}}
{{--                </div>--}}
{{--                <div class="swiper-slide">--}}
{{--                    <img data-src="https://images.pexels.com/photos/51415/pexels-photo-51415.jpeg?cs=srgb&dl=pexels-max-deroin-51415.jpg&fm=jpg"--}}
{{--                         class="swiper-lazy"/>--}}
{{--                </div>--}}
            </div>


            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
</header> <!-- end of header -->



