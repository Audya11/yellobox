<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\RegiterController;



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

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/tables', function () {
    return view('admin.jadwal.tables');
});

Route::get('/billing', function () {
    return view('admin.billing');
});

Route::get('/login', [Logincontroller::class, 'index'])->middleware('guest');
Route::post('/login', [Logincontroller::class, 'authenticate']);
Route::post('/logout', [Logincontroller::class, 'logout']);

Route::get('/register', function () {
    return view('admin.register.index');
});

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/notifikasi', function () {
    return view('admin.notifikasi');
});

Route::get('/instruktur', function () {
    return view('admin.instruktur.index');
});

Route::get('/sekolah', function () {
    return view('admin.sekolah.index');
});

Route::get('/absen', function () {
    return view('admin.absen.index');
});

Route::get('/create', function () {
    return view('admin.instruktur.create');
});
