<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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

}
