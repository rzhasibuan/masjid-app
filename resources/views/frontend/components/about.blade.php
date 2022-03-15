<div class="about" id="about">
    <div class="text-center"
         data-aos="fade-up"
         data-aos-offset="100"
         data-aos-duration="1000">
        <h2 class="text-gray-500 my-10">ABOUT ELTA</h2>
    </div>
    <div class="flex lg:flex-row flex-col max-w-5xl mx-auto my-8  items-center">
        <div class="lg:mx-4 mx-auto flex justify-center w-5/6"
             data-aos="fade-up"
             data-aos-offset="200"
             data-aos-duration="1000">
            <img class="rounded-xl shadow-lg object-cover h-52 w-96" src="{{asset('storage/')}}/{{$about->thumbnail ?? ""}}" alt="{{$header->bigtitle ?? ""}}">
        </div>
        <div class="flex flex-col items-center lg:mx-4 mx-auto rounded-xl transform transition duration-150  lg:my-0 my-4 w-5/6 lg:p-8 p-0"
             data-aos="fade-up"
             data-aos-offset="300"
             data-aos-duration="1000">
            <p class="text-justify p-6 text-gray-500">{{ $about->description ?? "" }}</p>
            <div>
                <a href="{{route('frontend.about')}}" class="bg-blue-400 text-white py-4 px-6 rounded-full my-4 hover:shadow-lg hover:bg-white hover:text-gray-500">Read More About Us</a>
            </div>
        </div>
    </div>
</div>
