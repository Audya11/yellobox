<?php

namespace App\Http\Controllers;

use App\Models\asisten;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Sekolah;
use App\Models\User;


class JadwalController extends Controller
{
    public function index (){
        
        $jadwals = Jadwal::with('sekolah', 'user', 'asisten')->get();
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
        // dd($request);
      
        
        $validateData = request()->validate([
            "tanggal" => "required",
            "jammengajar"=> "required",
            "matapelajaran"=> "required",
        ]);
        $jadwal = Jadwal::create([
            "tanggal" => $request->tanggal,
            "jammengajar" => $request->jammengajar,
            "matapelajaran" => $request->matapelajaran,
        ]);
        $sekolah = sekolah::find($request->sekolah_id);
        $user = User::find($request->user_id);
        $asisten = User::find($request->asisten_id);

        // dd($asisten);
        $jadwal->sekolah()->sync($sekolah);
        $jadwal->user()->sync($user);
        $jadwal->asisten()->sync([
            "jadwal_id"=> $jadwal->id,
            "asisten_id" => $asisten
        ]);
        // // dd($request->asisten_id);
        // // $j_asisten = asisten::create(array(
        // //     "jadwal_id"=> $jadwal->id,
        // //     "asisten_id" => $request->asisten_id
        // )
            
        // );
        // dd($j_asisten);
        // $j_asisten->jadwal_id = $jadwal->id;
        // $j_asisten->asisten_id = (int)$request->asisten_id ;
        // $j_asisten->save();
    
        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Di tambahkan');
    }

}
