<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;


class AbsensiController extends Controller
{
    public function index (){
        $absensis = Absensi::all();
        return view('admin.absen.index', [
            "title"=> "Laporan",
            "absensis" => $absensis,
        ]);
    }
    public function create(){
        return view('admin.absen.create', [
            "title" => "create",
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        Absensi::create($validateData);
        return redirect('/absen')->with('success', 'Instruktur Berhasil Di tambahkan');
    }

    public function update(Request $request, $slug){
        $absensi = Absensi::where('slug', $slug)->first();

        $absensi->tanggal = $request->tanggal;
        $absensi->status = $request->status;

        $absensi->save();

        return redirect('/absen');
    }
    
}
