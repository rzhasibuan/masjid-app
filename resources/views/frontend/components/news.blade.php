<div class="news">
    <div data-aos="fade-up"
         data-aos-offset="100"
         data-aos-duration="1000">
        <h2 class="text-gray-500 text-center p-10">Read latest news & articles</h2>
    </div>
    <div class="max-w-7xl mx-auto flex lg:flex-row flex-col justify-center my-10 lg:p-0 p-10">
        @foreach($news as $news)
            <a href="{{route('frontend.blog', $news->slug)}}">
                <div class="rounded-lg overflow-hidden shadow-sm mx-4 lg:my-0 my-4 hover:shadow-xl transition duration-150 w-50"
                     data-aos="fade-up"
                     data-aos-offset="100"
                     data-aos-duration="1000">
                    <img src="{{asset('storage/'.$news->thumbnail)}}" alt="{{$news->title}}"  class="object-cover h-52 w-96">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$news->title}}</div>
                        <p class="card-text"><small class="text-muted">Publish {{$news->created_at->format('d M, Y')}}</small></p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$news->category}}</span>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

    <div class="max-w-2xl mx-auto flex justify-center">
        <a href="{{route('frontend.blogs')}}" class="bg-blue-500 py-3 px-6 text-white rounded-full hover:bg-blue-100 shadow-xl hover:text-blue-900 transition duration-300"
           data-aos="fade-up"
           data-aos-offset="100"
           data-aos-duration="1000">More News</a>
    </div>
</div>
