<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function Login(){
        return view('Login/Login');
    }
    public function Autentikasi(Request $request){
        $credential= $request->validate([
            'username'=>'required|max:14|min:1',
            'password'=>'required|max:255|min:2'
         ]);
         // cek pengiriman data dari route
         //dd($request->all());
         //lalu cek emailnya udh terdaftar apa belum dan password nnya juga di database
         if(Auth::attempt($credential)){
             $request->session()->regenerate();
             // jika benar email dan passwordnya maka alihkan ke halaman dashboard
             return redirect()->intended('/Dashboard');
         }
  
         //jika salah email dan passwodrnya maka kembalikan ke halaman login
         return back()->with('loginError','Login failed ! Please check email and password');
    }
    
    public function logout(Request $request){
        // lakukan proses log out
       Auth::logout();
       
       //bikin tokennya validate supaya tidak dibajak
       $request->session()->invalidate();
       // lalu bikin token baru 
       $request->session()->regenerateToken();
       // lalu pindahkan ke route yang akan diinginkan
       return redirect('/');
    }
}
