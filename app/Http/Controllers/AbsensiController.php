<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;


class AbsensiController extends Controller
{
    public function index (){
        $absensis=Absensi::all();
        return view('admin.absen.index', [
            "title"=> "Laporan",
            "absensis"=> $absensis
        ]);
    }
    public function create(){
        $users = User::all();
        return view('admin.absen.create', [
            "title" => "create",
            "users" => $users
        ]);

    }

    public function store(Request $request){
        $validateData = $request->validate([
            'user_id' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        
        $validateData['user_id'] = $request->user_id;
        Absensi::create($validateData);

        return redirect('/absensi')->with('success', 'Instruktur Berhasil Di tambahkan');

    }
    
}
