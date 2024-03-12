<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Jadwal;
use App\Models\asisten;
use App\Models\Sekolah;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JadwalController extends Controller
{
    public function index (){

        $jadwals = Jadwal::with('sekolah', 'user', 'asisten')->get();
        return view('admin.jadwal.index', [
            "title"=> "jadwal",
            "jadwals" => $jadwals
        ]);
    }

    public function cetakJadwal() {

        $jadwal = Jadwal::with('sekolah', 'user', 'asisten')->get();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.jadwal.cetak-jadwal', [
            "title"=> "Jadwal",
            "jadwals" => $jadwal
        ]));
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream('jadwal.pdf',  array("Attachment"=>false));
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
        $asisten = User::find($request->user_id);

        // dd($asisten);
        $jadwal->sekolah()->sync($sekolah);
        $jadwal->user()->sync($user);
        $jadwal->asisten()->sync($asisten);
        
    
        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Di tambahkan');
    }

    public function edit($slug){
        $jadwal=Jadwal::where('slug', $slug)->with('sekolah', 'user', 'asisten')->first();
        $sekolahs = Sekolah::all();
        $users = User::all();
        return view('admin.jadwal.edit', [
            "title"=> "edit",
            "jadwal"=> $jadwal,
            "sekolahs"=>$sekolahs,
            "users"=>$users
        ]);
    }

    public function update(Request $request, $slug){
        $jadwal = Jadwal::where('slug', $slug)->first();
        $sekolah = sekolah::find($request->sekolah_id);
        $user = User::find($request->user_id);
        $asisten = User::find($request->user_id);
        
        $jadwal->matapelajaran = $request->matapelajaran;
        $jadwal->jammengajar = $request->jammengajar;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->save(); 
        $jadwal->sekolah()->sync($sekolah);
        $jadwal->user()->sync($user);
        $jadwal->asisten()->sync($asisten);

        return redirect('/jadwal')->with('success', 'Jadwal Bereah Di edit');
    }

    public function destroy($slug){
        // make delete function for controller
        $jadwal = Jadwal::where('slug', $slug)->with('sekolah', 'user', 'asisten')->first();
        
        $jadwal->asisten()->detach();
        $jadwal->user()->detach();
        $jadwal->sekolah()->detach();
        $jadwal->delete();
        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Di hapus');
    }





}
