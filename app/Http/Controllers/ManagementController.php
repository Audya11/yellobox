<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        return view('admin.user_management.index', [
            'title' => 'Management',
            'managements'=>User::all()
        ]);
    }

    public function create(){

        return view('admin.user_management.create', [
            'title' => 'Management'
        ]);
    }

    public function store(Request $request){
        // @dd($request);

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'notelp' => 'required',
            'is_admin' => 'required',
        ]);
        User::create($validateData);
        return redirect('/user-management')->with('success', 'Management Berhasil Di tambahkan');
    }
}
