<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AbsensiController;

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
    return view('admin.index',[
        "title"=> "home"
    ]);

});
Route::get('/admin', function () {
    return view('admin.index', [
        "title"=> "admin"
    ]);
})->middleware('auth');



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
Route::get('/sekolah', [SekolahController::class,'index']);
Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get('/absen', [AbsensiController::class,'index']
);

Route::get('/absensi/create', [AbsensiController::class,'create']);
Route::post('/absensi', [AbsensiController::class,'store']);
Route::put('/absensi/{slug}', [AbsensiController::class, 'update']);

Route::get('/instruktur/create', [InstrukturController::class,'create']);
Route::post('/instruktur', [InstrukturController::class,'store']);
Route::get('/instruktur/{slug}/edit', [InstrukturController::class,'edit']);
Route::put('/instruktur/{slug}', [InstrukturController::class,'update']);
Route::delete('/instruktur/{slug}', [InstrukturController::class,'destroy']);
Route::get('/sekolah/create', [SekolahController::class,'create']);
Route::post('/sekolah', [SekolahController::class,'store']);
Route::get('/sekolah/{slug}/edit', [SekolahController::class,'edit']);
Route::put('/sekolah/{slug}', [SekolahController::class,'update']);
Route::delete('/sekolah/{slug}', [SekolahController::class,'destroy']);
Route::get('/jadwal/create', [JadwalController::class,'create']);
Route::post('/jadwal', [JadwalController::class,'store']);


