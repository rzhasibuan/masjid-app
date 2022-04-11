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
Route::get('/kegiatan/{id}', 'FrontendController@kegiatan')->name('frontend.kegiatan');
Route::get('/bantuan/{id}', 'FrontendController@bantuan')->name('frontend.bantuan');
Route::get('/kegiatan', 'FrontendController@kegiatans')->name('frontend.kegiatans');
Route::get('/bantuan', 'FrontendController@bantuans')->name('frontend.bantuans');
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
->group(function() {
    Route::resource('user','UserController')->middleware(['auth','role:ketua']);
    Route::resource('role','RoleController')->middleware(['auth','role:ketua']);
    Route::resource('permission','PermissionController')->middleware(['auth','role:ketua']);
    Route::resource('header', 'HeaderController')->middleware(['auth','role:ketua|pengurus']);
    Route::resource('about', 'AboutController')->middleware(['auth','role:ketua|pengurus']);
    Route::resource('keuangan', 'KeuanganKasController')->middleware(['auth','role:ketua|bendahara']);
    Route::resource('kegiatan', 'KegiatanMasjidController')->middleware(['auth','role:ketua|pengurus']);
    Route::resource('bantuan', 'BantuanController')->middleware(['auth','role:ketua|pengurus']);
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload')->middleware(['auth','role:ketua']);
    Route::get('laporan/kas', 'KeuanganKasController@laporan')->name('laporan.kas')->middleware(['auth','role:ketua|bendahara']);
});
