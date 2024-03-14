<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InstrukturController extends Controller
{
    public function index (){
        $users=User::all();
        return view('admin.instruktur.index', [
            "title"=> "Instruktur",
            "users"=> $users
        ]);
    }

    public function create(){
        return view('admin.instruktur.create', [
            "title" => "create"
        ]);

    }
    
    public function store (Request $request){
        // @dd($request);
 
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'keahlian' => 'required',
            // 'photo' => 'required|mimetypes:image/jpeg,image/png,image/jpg',
            'alamat'=> 'required',
            'notelp'=> 'required',
        ]);
        if($request->hasFile('photo')){
            $validateData['photo']= $request->file('photo')->store('instruktur');
        }
        User::create($validateData);

        return redirect('/instruktur')->with('success', 'Instruktur Berhasil Di tambahkan');


    }

    public function edit($slug){
        $user=User::where('slug', $slug)->first();
        return view('admin.instruktur.edit', [
            "title"=> "edit",
            "user"=> $user
        ]);
    }

    public function update(Request $request, $slug){
        $user = User::where('slug', $slug)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->keahlian = $request->keahlian;
        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;

        if($request->hasFile('photo')){
            if ($user->photo){
                Storage::delete($user->photo);
            }
            $user->photo = $request->file('photo')->store('instruktur');
        }

        $user->save();
        return redirect('/instruktur')->with('success', 'Instruktur Berhasil Di edit');
         
    }

    public function destroy($slug){
        $user = User::where('slug', $slug)->first();
        Storage::delete($user->photo);
        $user->delete();
        return redirect('/instruktur')->with('success', 'Instruktur Berhasil Di hapus');
    }
}
