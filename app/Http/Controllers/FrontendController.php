<?php

namespace App\Http\Controllers;

use App\About;
use App\BantuanMasjid;
use App\Colaboration;
use App\Header;
//use App\News;
use App\KegiatanMasjid;
use App\testimonials;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
//        $news = News::all()->sortByDesc('created_at');
        $kegiatan = KegiatanMasjid::orderBy('created_at','desc')->where('published',1)->paginate(6);
        $bantuan = BantuanMasjid::orderBy('created_at','desc')->paginate(6);
        $colaboration = Colaboration::all();
        $testimonials = testimonials::all();
        $about = About::all()->first();
//        dd($about);
        $header = Header::all()->first();
        return view('frontend.welcome', [
            'kegiatan' => $kegiatan,
            'bantuan' => $bantuan,
            'testimonials' => $testimonials,
            'colaboration' => $colaboration,
            'about' => $about,
            'header' => $header
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
