<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\ManagementController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('admin');

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

Route::get('/absen', [AbsensiController::class,'index']
);

Route::get('/absensi/create', [AbsensiController::class,'create']);
Route::post('/absensi', [AbsensiController::class,'store']);

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
Route::get('/user-management', [ManagementController::class, 'index']);
Route::get('/user-management/create', [ManagementController::class, 'create']);
Route::post('/user-management', [ManagementController::class, 'store']);

// report pdf
Route::get('/jadwal/cetak-jadwal', [JadwalController::class, 'cetakJadwal']);

