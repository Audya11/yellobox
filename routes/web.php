<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('admin.login.index');
});

Route::get('/register', function () {
    return view('admin.login.register');
});

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/notifikasi', function () {
    return view('admin.notifikasi');
});

Route::get('/instruktur', function () {
    return view('admin.instruktur.index', [
        "title"=> "Instruktur"
    ]);
});

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

Route::get('/create', function () {
    return view('admin.instruktur.create', [
        "title" => "create"
    ]);
});
