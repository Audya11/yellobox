<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Sekolah;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'logo' => 'required|mimetypes:image/png,image/jpg,image/jpeg',
            'alamat' => 'required',
            'notelp'=> 'required',
            'pic'=> 'required',
        ]);

        if($request->hasFile('logo')){
            $validateData['logo'] = $request->file('logo')->store('logo_sekolah');
        }
    

        Sekolah::create($validateData);
       
        return redirect('/sekolah')->with('success', 'Sekolah Berhasil Di tambahkan');
    }


    public function edit ($slug){
       // Find the sekolah by slug
    $sekolah = Sekolah::where('slug', $slug)->first();

    // Return the view for editing the sekolah
    return view('admin.sekolah.edit', [
        "title" => "edit",
        "sekolah" => $sekolah
    ]);

    }

    public function update (Request $request, $slug){
        // Find the school based on the provided slug
    $sekolah = Sekolah::where('slug', $slug)->first();

    // Update the school with the data from the request
    $sekolah->update($request->all());

    // Save the updated school
    $sekolah->save();

    // Redirect to the school page with a success message
    return redirect('/sekolah')->with('success', 'Sekolah Berhasil Di edit');
    }

    public function destroy ($slug){
       // Find the school by its unique slug
    $sekolah = Sekolah::where('slug', $slug)->first();

    Storage::delete($sekolah->logo);

    // Delete the school
    $sekolah->delete();

    // Redirect to the school index page with a success message
    return redirect('/sekolah')->with('success', 'Sekolah Berhasil Di hapus');
    }
}