<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Logincontroller extends Controller

{
public function index()
{
return view('admin.login.index',[
"title"=> "Login"
]);
}

public function authenticate (Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }
    return back()->with('loginError', "Email or password is wrong");
}

public function logout(){
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redict('/login');
}
}