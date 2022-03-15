<?php

namespace App\Http\Controllers;

use App\About;
use App\Colaboration;
use App\Header;
use App\Models\Permission;
use App\Models\Role;
use App\News;
use App\testimonials;
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
        $news = News::all()->count();
        $user = User::all()->count();
        $role = Role::all()->count();
        $permission = Permission::all()->count();
        $collaboration = Colaboration::all()->count();
        $testimonials = testimonials::all()->count();
        $header = Header::all()->count();
        $about = About::all()->count();
        
        return view('home', [
            'title' => "Dashboard",
            'subDashboard' => 'active',
            'news' => $news,
            'users' => $user,
            'role' => $role,
            'permission' => $permission,
            'collaboration' => $collaboration,
            'testimonials' => $testimonials,
            'header' => $header,
            'about' => $about
        ]);
    }


}
