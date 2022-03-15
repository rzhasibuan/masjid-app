<div class="slider-1 py-32 ">
    <div class="container px-4 sm:px-8">
        <h2 class="mb-12 text-center lg:max-w-xl lg:mx-auto"
            data-aos="fade-up"
            data-aos-offset="100"
            data-aos-duration="1000">Educator Testimonials</h2>

        <!-- Card Slider -->
        <div class="slider-container"
             data-aos="fade-up"
             data-aos-offset="100"
             data-aos-duration="1000">
            <div class="swiper-container card-slider">
                <div class="swiper-wrapper">

                    @foreach($testimonials as $testi)
                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="{{asset('storage/'.$testi->thumbnail)}}" alt="{{$testi->name}}" />
                                <div class="card-body">
                                    <p class="italic mb-3">{{$testi->qoute}}</p>
                                    <p class="testimonial-author">{{$testi->name}}</p>
                                </div>
                            </div>
                        </div> <!-- end of swiper-slide -->
                        <!-- end of slide -->
                    @endforeach


                </div> <!-- end of swiper-wrapper -->

                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- end of add arrows -->

            </div> <!-- end of swiper-container -->
        </div> <!-- end of slider-container -->
        <!-- end of card slider -->

    </div> <!-- end of container -->
</div> <!-- end of slider-1 -->
