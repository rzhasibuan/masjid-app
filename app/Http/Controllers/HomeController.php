<?php

namespace App\Http\Controllers;

use App\About;
use App\BantuanMasjid;
use App\Header;
use App\KegiatanMasjid;
use App\KeuanganKas;
use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all()->count();
        $role = Role::all()->count();
        $permission = Permission::all()->count();
        $header = Header::all()->count();
        $about = About::all()->count();
        $saldo = KeuanganKas::orderBy('id','desc')->first();
        $bantuan = BantuanMasjid::all();
        $kegiatan = KegiatanMasjid::orderBy('created_at','desc')->where('published',1);

        return view('home', [
            'title' => "Dashboard",
            'subDashboard' => 'active',
            'users' => $user,
            'role' => $role,
            'permission' => $permission,
            'header' => $header,
            'about' => $about,
            'saldo' => $saldo,
            'bantuan' => $bantuan,
            'kegiatan' => $kegiatan,
        ]);
    }


}
