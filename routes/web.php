<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\InstrukturController;


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
    return view('admin.index', [
        "title"=> "admin"
    ]);
})->middleware('auth');
Route::get('/jadwal', function () {
    return view('admin.jadwal.jadwal', [
        "title"=> "jadwal"
    ]);
});

Route::get('/billing', function () {
    return view('admin.billing', [
        "title"=> "billing"
    ]);
});

Route::get('/login', [Logincontroller::class, 'index'])->name('login');
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

Route::get('/instruktur', [InstrukturController::class,'index']);

Route::get('/sekolah', function () {
    return view('admin.sekolah.index', [
        "title"=> "sekolah"
    ]);
});

Route::get('/absen', function () {
    return view('admin.absen.index', [
        "title"=> "absen"
    ]);
});

Route::get('/instruktur/create', [InstrukturController::class,'create']);
