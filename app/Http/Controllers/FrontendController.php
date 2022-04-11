<?php

namespace App\Http\Controllers;

use App\About;
use App\BantuanMasjid;
use App\Header;
use App\KegiatanMasjid;
use App\KeuanganKas;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanMasjid::orderBy('created_at','desc')->where('published',1)->paginate(6);
        $bantuan = BantuanMasjid::orderBy('created_at','desc')->paginate(6);
        $about = About::all()->first();
        $header = Header::all()->first();
        $saldo = KeuanganKas::orderBy('id','desc')->first();
        return view('frontend.welcome', [
            'kegiatan' => $kegiatan,
            'bantuan' => $bantuan,
            'about' => $about,
            'header' => $header,
            'saldo' => $saldo,
            'title' => 'Sistem informasi Mesjid Al fath'
        ]);
    }

    public function kegiatan($id){
        $data = KegiatanMasjid::where('slug',$id)->get()->first();
        $kegiatan = KegiatanMasjid::orderBy('created_at','desc')->where('published',1)->paginate(3);

        return view('frontend.kegiatan', [
            'title' => $data->judul,
            'data' => $data,
            'kegiatan' => $kegiatan
        ]);

    }



    public function kegiatans(){
        $kegiatan = KegiatanMasjid::orderBy('created_at','desc')->where('published',1)->get();

        return view('frontend.kegiatans', [
            'title' => 'Jadwal Informasi & Kegiatan Pengajian',
            'kegiatan' => $kegiatan
        ]);
    }

    public function about(){
        $about = About::get()->first();
        return view('frontend.about', [
            'title' => 'About',
            'data' => $about
        ]);
    }
}
