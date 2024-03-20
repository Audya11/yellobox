<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\User;
use App\Models\LaporanPresensi;
use App\Models\sekolah;
use Illuminate\Http\Request;


class AbsensiController extends Controller
{
    public function index ($slug){
        $sekolah = sekolah::where('slug', $slug)->with('absensi')->first();
        $absensis = Absensi::all();
        // dd($absensis);
        // dd($sekolah);
        return view('admin.absen.index', [
            "title"=> "Presensi",
            "sekolah" => $sekolah,
            "absensis" => $absensis
        ]);
    }
    public function create($slug){
        $sekolah = sekolah::where('slug', $slug)->first();
        return view('admin.absen.create', [
            "title" => "create",
            "sekolah" => $sekolah
        ]);
    }

    public function store(Request $request){
      
        $sekolah = sekolah::where('id', $request->sekolah_id)->first();
        // dd($sekolah->slug);
        $validateData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'sekolah_id' => 'required'
        ]);

        Absensi::create($validateData);
        return redirect('/presensi/' . $sekolah->slug)->with('success', 'Instruktur Berhasil Di tambahkan');
    }

    public function update(Request $request, $slug){
        $absensi = Absensi::where('slug', $slug)->first();
        $sekolah = sekolah::where('id', $absensi->sekolah_id)->first();
        
        $absensi->tanggal = $request->tanggal;
        $absensi->status = $request->status;
      
        LaporanPresensi::create([
            'nama' => $absensi->nama,
            'kelas' => $absensi->kelas,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'sekolah_id' => $sekolah->id
        ]);
        $absensi->save();
        
        return redirect('/presensi/'.$sekolah->slug);
    }
   
    public function destroy($slug){
        // make delete function for controller
        $absensi = Absensi::where('slug', $slug)->first();
        $sekolah = sekolah::where('id', $absensi->sekolah_id)->first();
        // dd($sekolah->slug);
        
        $absensi->delete();
        return redirect('/presensi/'. $sekolah->slug)->with('success', 'Data Berhasil Di hapus');
}
}
