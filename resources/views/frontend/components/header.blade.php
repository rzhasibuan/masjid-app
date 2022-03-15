<header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32 bg-blue-800">
    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="mb-16 lg:mt-32 xl:mt-3 xl:mr-12 item-aos"
             data-aos="fade-up"
             data-aos-offset="100"
             data-aos-duration="1000">
            <h1 class="h1-large mb-5 text-white">{{$header->bigtitle ?? ""}}</h1>
            <p class="p-large mb-8 text-white">{!! $header->text ?? "" !!}</p>
            <a class="bg-blue-100 py-2 px-4 rounded-full text-gray-700 hover:shadow-xl hover:bg-blue-500 hover:text-white" href="{{$header->linkButton ?? ""}}">JOIN MEMBERSHIP</a>
        </div>
        <div class="xl:text-right item-aos"
             data-aos="fade-up"
             data-aos-offset="100"
             data-aos-duration="1000">
            <img class="inline rounded-xl shadow-xl" src="{{asset('storage/')}}/{{$header->thumbnail ?? ""}}" alt="English Lecturers And Teachers Association" />
        </div>
    </div> <!-- end of container -->
</header> <!-- end of header -->
