<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\SekolahController;


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
});
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

Route::get('/login', [Logincontroller::class, 'index'])->middleware('guest');
Route::post('/login', [Logincontroller::class, 'authenticate']);

Route::get('/register', function () {
    return view('admin.login.register');
});

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/notifikasi', function () {
    return view('admin.notifikasi');
});

Route::get('/instruktur', [InstrukturController::class,'index']);

Route::get('/sekolah', [SekolahController::class,'index']);

Route::get('/absen', function () {
    return view('admin.absen.index', [
        "title"=> "absen"
    ]);
});

Route::get('/instruktur/create', [InstrukturController::class,'create']);
Route::post('/instruktur', [InstrukturController::class,'store']);
Route::get('/instruktur/{slug}/edit', [InstrukturController::class,'edit']);
Route::put('/instruktur/{slug}', [InstrukturController::class,'update']);
Route::delete('/instruktur/{slug}', [InstrukturController::class,'destroy']);
Route::get('/sekolah/create', [SekolahController::class,'create']);
Route::post('/sekolah', [SekolahController::class,'store']);
