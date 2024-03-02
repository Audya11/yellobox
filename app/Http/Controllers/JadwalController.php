<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Sekolah;
use App\Models\User;


class JadwalController extends Controller
{
    public function index (){
        @dd(Jadwal::with('sekolah', 'instruktur')->get()->toSql());
        $jadwals = Jadwal::all();
    
  

        return view('admin.jadwal.index', [
            "title"=> "Jadwal",
            "jadwals" => $jadwals
        ]);
    }

    public function create (){
     
        $sekolahs = Sekolah::all();
        $users = User::all();
        return view('admin.jadwal.create', [
            "title"=> "Jadwal",
            "users"=>$users,
            "sekolahs"=>$sekolahs
        ]);
    }

    public function store (Request $request){
        
        $validateData = request()->validate([
            "sekolah_id" => "required",
            "user_id" => "required",
            "tanggal" => "required",
            "jammengajar"=> "required",
            "matapelajaran"=> "required",
            "asisten"=> "required"
        ]);
        $jadwal = Jadwal::create($validateData);

        $sekolah = sekolah::find($request->sekolah_id);
        $user = User::find($request->user_id);

        
        $sekolah->jadwal_id = $jadwal->id;
        $user->jadwal_id = $jadwal->id;

        $sekolah->save();
        $user->save();

        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Di tambahkan');
    }

}
