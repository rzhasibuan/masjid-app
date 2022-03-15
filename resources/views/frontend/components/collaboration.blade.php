<div id="collaboration" class="bg-blue-400 p-10">
    <div class="my-10" data-aos="fade-up"
         data-aos-offset="100"
         data-aos-duration="1000">
        <h2 class="text-gray-100 text-center">WE COLLABORATION WITH</h2>
    </div>
    <div class="max-w-7xl mx-auto flex lg:flex-row flex-col justify-center" >
        @foreach($colaboration as $colab)
            <div class="mx-4"
                 data-aos="fade-up"
                 data-aos-offset="100"
                 data-aos-duration="1000">
                <a href="{{$colab->link}}">
                    <img src="{{asset('storage/'.$colab->thumbnail)}}" alt="we colloboration" class="opacity-30 object-cover h-40 w-80 mx-auto lg:p-0 p-6 transition duration-300 hover:opacity-100">
                </a>
            </div>
        @endforeach
        {{--        <div class="mx-4"--}}
        {{--             data-aos="fade-up"--}}
        {{--             data-aos-offset="100"--}}
        {{--             data-aos-duration="1000">--}}
        {{--            <a href="https://www.methodist.ac.id/home.do">--}}
        {{--                <img src="{{asset('frontend/images/methodist_logo.png')}}" alt="universitas methodist indonesia medan" class="opacity-30 lg:w-80 w-40 mx-auto p-6 transition duration-300 hover:opacity-100">--}}
        {{--            </a>--}}
        {{--        </div>--}}

        {{--        <div class="mx-4"--}}
        {{--             data-aos="fade-up"--}}
        {{--             data-aos-offset="100"--}}
        {{--             data-aos-duration="1000">--}}
        {{--            <a href="https://uhn.ac.id/">--}}
        {{--                <img src="{{asset('frontend/images/logo_cms_uhn.png')}}" alt="universitas hkbp medan" class="opacity-30 lg:w-80 w-40 mx-auto p-6 transition duration-300 hover:opacity-100">--}}
        {{--            </a>--}}
        {{--        </div>--}}

        {{--        <div class="mx-4"--}}
        {{--             data-aos="fade-up"--}}
        {{--             data-aos-offset="100"--}}
        {{--             data-aos-duration="1000">--}}
        {{--            <a href="https://uisu.ac.id">--}}
        {{--                <img src="{{asset('frontend/images/header-uisu-1.png')}}" alt="universitas islam sumatra utara" class="opacity-30 lg:w-80 w-40 mx-auto p-6 transition duration-300 hover:opacity-100">--}}
        {{--            </a>--}}
        {{--        </div>--}}

        {{--        <div class="mx-4"--}}
        {{--             data-aos="fade-up"--}}
        {{--             data-aos-offset="100"--}}
        {{--             data-aos-duration="1000">--}}
        {{--            <a href="">--}}
        {{--                <img src="{{asset('frontend/images/santomas.png')}}" alt="universitas santo thomas medan" class="opacity-30 lg:w-80 w-40 mx-auto p-6 transition duration-300 hover:opacity-100">--}}
        {{--            </a>--}}
        {{--        </div>--}}


        {{--        <div class="mx-4"--}}
        {{--             data-aos="fade-up"--}}
        {{--             data-aos-offset="100"--}}
        {{--             data-aos-duration="1000">--}}
        {{--            <a href="#">--}}
        {{--                <img src="{{asset('frontend/images/bukitlawang.webp')}}" alt="Kemenristekdikti wilayah I" class="opacity-30 lg:w-80 w-40 mx-auto p-6 transition duration-300 hover:opacity-100">--}}
        {{--            </a>--}}
        {{--        </div>--}}

    </div>
</div>
