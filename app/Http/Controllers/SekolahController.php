<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index (){
        $sekolahs = Sekolah::all();
        return view('admin.sekolah.index', [
            "title"=> "Sekolah",
            "sekolahs" => $sekolahs
        ]);
    }

    public function create (){
        return view('admin.sekolah.create', [
            "title"=> "Sekolah"
        ]);
    }

    public function store (Request $request){
    
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'notelp'=> 'required',
            'pic'=> 'required',
        ]);
        Sekolah::create($validateData);
        return redirect('/sekolah')->with('success', 'Sekolah Berhasil Di tambahkan');
    }
}