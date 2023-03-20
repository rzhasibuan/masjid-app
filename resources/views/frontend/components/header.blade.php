<header id="header" class="header text-center lg:text-left ">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($header as $data)
                    <div class="swiper-slide">
                        <img data-src=" {{ asset('storage/')}}/{{$data->thumbnail ?? "https://images.pexels.com/photos/1824273/pexels-photo-1824273.jpeg?cs=srgb&dl=pexels-victor-miyata-1824273.jpg&fm=jpg"}}"
                             class="swiper-lazy" alt="{{$data->text}}, {{$data->bigtitle}}"/>
                    </div>
                @endforeach
            </div>


            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
</header> <!-- end of header -->



