<div id="collaboration" class="bg-green-500 p-10">
    <div class="my-10" data-aos="fade-up"
         data-aos-offset="100"
         data-aos-duration="1000">
        <h4 class="text-gray-100 text-center">INFORMASI SALDO YANG TERKUMPUL</h4>
        <p class="text-gray-100 text-center">No Rekening : {{\App\About::information()->no_rekening}}</p>
        <div class="max-w-7xl mx-auto flex lg:flex-row flex-col justify-center">
            <a href="https://api.whatsapp.com/send?phone={{\App\About::information()->no_whatsapp}}&text=Assalammu'alaikum" class="bg-green-700 text-white py-4 px-6 mt-4 rounded-full">hubungi di whatsapp</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto flex lg:flex-row flex-col justify-center" >
            <div class="mx-4"
                 data-aos="fade-up"
                 data-aos-offset="100"
                 data-aos-duration="1000">
                @if(!$saldo == null)
                    <h5 class="text-green-100 ">Rp. {{number_format($saldo->saldo, 2)}}</h5>
                    <br>
                    <a href="{{route('laporan.kas')}}" class="bg-green-700 text-white py-4 px-6 mt-4 rounded-full">lihat keterangan saldo</a>
                @else
                    <h5 class="text-green-100 ">Rp. 0</h5>
                @endif

            </div>
    </div>
</div>
