<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\sekolah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        $jadwal=Jadwal::all();
        $user=User::all();
        $sekolah=sekolah::all();
        return view('admin.index', [
            "title"=> "Dashboard",
            "jadwal" => $jadwal,
            "user" => $user,
            "sekolah" => $sekolah
        ]);
    }

    
}
