<div class="bantuan" id="bantuan">
    <div data-aos="fade-up"
         data-aos-offset="100"
         data-aos-duration="1000">
        <h2 class="text-green-500 text-center p-10">INFROMASI BANTUAN</h2>
    </div>
    <div class="max-w-7xl mx-auto flex lg:flex-row flex-col flex-wrap justify-center my-10 lg:p-0 p-10">
        @if(!$bantuan->count() == 0)
            @foreach($bantuan as $data)
                    <div class="rounded-lg overflow-hidden shadow-sm lg:my-3 my-4 mx-4 hover:shadow-xl transition duration-150 w-100"
                         data-aos="fade-up"
                         data-aos-offset="100"
                         data-aos-duration="1000">
    {{--                    <img src="{{asset('storage/'.$data->thumbnail)}}" alt="{{$data->title}}"  class="object-cover h-52 w-96">--}}
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 text-gray-500">{{$data->judul}}</div>
                            <p>Pemberi bantuan : <b> {{$data->pemberi}}</b></p>
                            <p>Penerima bantuan  : <b>{{$data->penerima}}</b></p>
                            <p class="card-text text-gray-400"><small class="text-muted">Tanggal mulai pada {{$data->tanggal_mulai}} pukul {{$data->jam_mulai}} WIB s/d {{$data->tanggal_akhir}} pukul {{$data->jam_akhir}} WIB</small></p>
                            <p class="card-text text-gray-400"><small class="text-muted">Lokasi:  {{$data->lokasi}}</small></p>
                        </div>
                    </div>
            @endforeach
        @else
            <p class="text-gray-400">Bantuan belum tersedia</p>
        @endif
    </div>
</div>
