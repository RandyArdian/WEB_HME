<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\positionController;
use App\Http\Controllers\PostinganController;
use App\Models\Kategori;
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

Route::get('/', function () {
    return view('Beritaawal');
});
Route::get('/Berita',[PostinganController::class, 'ShowPostingan']);
Route::post('/Berita',[PostinganController::class, 'Show']);
Route::get('/DetailBerita/{Postingan:slug}',[PostinganController::class,'DetailBerita']);
Route::get('/Login',[LoginController::class,'Login'])->name('login')->middleware('guest');
Route::post('/Login/Autentikasi',[LoginController::class,'Autentikasi']);
Route::get('/Dashboard',function(){
    return view('Admin/dashhboard',[
        'active'=>'dashboard'
    ]);
})->middleware('auth');

Route::get('/BeritaAdmin/checkSlug',[AdminController::class,'checkSlug'])->middleware('auth');
Route::resource('/BeritaAdmin',AdminController::class)->middleware('auth');

Route::get('/Kategori/checkSlug',[KategoriController::class,'checkSlug'])->middleware('auth');
Route::resource('/Kategori',KategoriController::class)->middleware('auth');

//route member
Route::get('/Member/checkSlug',[memberController::class,'checkSlug'])->middleware('auth');
Route::resource('/Member',memberController::class)->middleware('auth');

//route position
Route::get('/position/checkSlug',[positionController::class,'checkSlug'])->middleware('auth');
Route::resource('/position', positionController::class)->middleware('auth');

//route akun
Route::get('/Akun',[AdminController::class,'akun'])->middleware('auth');
Route::put('/Akun/{User:slug}',[AdminController::class,'password'])->middleware('auth');

//route profil
Route::get('/Profil',[AdminController::class,'profil'])->middleware('auth');
Route::put('/profilUpdate/{User:slug}',[AdminController::class, 'profilupdate'])->middleware('auth');

//Logout
Route::post('/Logout',[LoginController::class,'logout'])->middleware('auth');





