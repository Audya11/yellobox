<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LaporanPresensi;
use App\Models\sekolah;

class LaporanAbsensiController extends Controller
{

    public function index($slug){
        $sekolah = sekolah::where('slug', $slug)->with('absensi')->first();
        $laporan_absensi = LaporanPresensi::all();
        return view('admin.laporan_absensi.index', [
            'title' => 'Laporan Absensi',
            'sekolah' => $sekolah,
            'laporan_absensis' => $laporan_absensi,
        ]);
    }
}
