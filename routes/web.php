<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\LaporanAbsensiController;
use App\Http\Controllers\data_pesertaController;

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


// Route::get('/',[DashboardController::class, 'index']);

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [Logincontroller::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [Logincontroller::class, 'authenticate']);
Route::post('/logout', [Logincontroller::class, 'logout']);

Route::get('/register', function () {
    return view('admin.register.index');
});

// Route::get('/profile', function () {
//     return view('admin.profile');
// });

// Route::get('/notifikasi', function () {
//     return view('admin.notifikasi');
// });

Route::get('/instruktur', [InstrukturController::class,'index']);
Route::get('/sekolah', [SekolahController::class,'index']);
Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get('/data_peserta', [data_pesertaController::class,'index']
);

Route::get('/presensi/{slug}', [AbsensiController::class,'index']
);

Route::get('/presensi/{slug}/create', [AbsensiController::class,'create']);
Route::post('/presensi/{slug}', [AbsensiController::class,'store']);
Route::put('/presensi/{slug}', [AbsensiController::class, 'update']);
Route::delete('/presensi/{slug}', [AbsensiController::class,'destroy']);

Route::get('/laporan-presensi/{slug}', [LaporanAbsensiController::class, 'index']);

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
Route::get('/jadwal/{slug}/edit', [JadwalController::class,'edit']);
Route::put('/jadwal/{slug}', [JadwalController::class,'update']);
Route::delete('/jadwal/{slug}', [JadwalController::class,'destroy']);

// report pdf
Route::get('/jadwal/cetak-jadwal', [JadwalController::class, 'cetakJadwal']);

