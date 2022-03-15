<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// frontend
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/blog/{id}', 'FrontendController@blog')->name('frontend.blog');
Route::get('/blog', 'FrontendController@blogs')->name('frontend.blogs');
Route::get('/about','FrontendController@about')->name('frontend.about');
// auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', function(){
    return redirect('/login');
});
//admin
Route::name('admin.') //pemberian nama seperti admin.user.index
->prefix('admin')
->namespace('Admin')
->middleware(['auth','role:superadmin'])
->group(function() {
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::resource('permission','PermissionController');
    Route::resource('news', 'NewsController');
    Route::resource('header', 'HeaderController');
    Route::resource('about-membership', 'AboutMembershipController');
    Route::resource('about', 'AboutController');
    Route::resource('colaboration', 'ColaborationController');
    Route::resource('testimonials', 'TestimonialsController');
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
});
