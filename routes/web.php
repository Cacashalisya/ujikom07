<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('kategori_wisata', \App\Http\Controllers\KategoriWisataController::class)->middleware('auth');
Route::resource('kategori_berita', \App\Http\Controllers\KategoriBeritaController::class)->middleware('auth');
Route::resource('obyek_wisata', \App\Http\Controllers\ObyekWisataController::class)->middleware('auth');
Route::resource('penginapan', \App\Http\Controllers\PenginapanController::class)->middleware('auth');
Route::resource('berita', \App\Http\Controllers\BeritaController::class)->middleware('auth');
Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
Route::resource('paket_wisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::resource('generate', \App\Http\Controllers\generate::class)->middleware('auth');



route::get('/cetak','\App\Http\Controllers\ReservasiController@cetak')->name('cetak');

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/client', function () {
    return view('client');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/main', function () {
    return view('welcome');
});

Route::get('/services', function () {
    return view('services');
});