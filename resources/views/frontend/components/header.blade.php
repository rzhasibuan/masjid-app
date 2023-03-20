<header id="header" class="header text-center lg:text-left ">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($header as $data)
                    <div class="swiper-slide mt-10 mb-10 my-5">

                        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8 mt-14 mb-10">
                            <div class="mb-16 lg:mt-8 xl:mt-3 xl:mr-12 item-aos"
                                 data-aos="fade-up"
                                 data-aos-offset="100"
                                 data-aos-duration="1000">
                                <h1 class="h1-large mb-5 text-green-600">{{$data->bigtitle ?? ""}}</h1>
                                <p class="p-large mb-8 text-green-500">{!! $data->text ?? "" !!}</p>
                                <a class="hover:bg-green-100 py-2 px-4 rounded-full hover:text-gray-700 hover:shadow-xl bg-green-500 text-white" href="{{$data->linkButton ?? ""}}">Tentang Kami</a>
                            </div>
                            <div class="xl:text-right item-aos"
                                 data-aos="fade-up"
                                 data-aos-offset="100"
                                 data-aos-duration="1000">
                                <img class="inline rounded-xl " src="{{asset('storage/')}}/{{$data->thumbnail ?? ""}}" alt="Masjid Al Fath" />
                            </div>
                        </div> <!-- end of container -->
{{--                        <img data-src=" {{ asset('storage/')}}/{{$data->thumbnail ?? "https://images.pexels.com/photos/1824273/pexels-photo-1824273.jpeg?cs=srgb&dl=pexels-victor-miyata-1824273.jpg&fm=jpg"}}"--}}
{{--                             class="swiper-lazy" alt="{{$data->text}}, {{$data->bigtitle}}"/>--}}
                    </div>
                @endforeach

            </div>


            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
{{--            <div class="swiper-pagination"></div>--}}

        </div>


</header> <!-- end of header -->



