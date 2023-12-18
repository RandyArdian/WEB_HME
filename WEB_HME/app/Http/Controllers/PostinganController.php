<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Kategori;
class PostinganController extends Controller
{
    public function ShowPostingan(Request $request){

        return view('Berita/Berita',[
            'postingan'=>Postingan::paginate(10)->withQueryString(),
            'Kategori'=>Kategori::all(),
            'kategorii'=>'all'
        ]);
    }
    public function DetailBerita(Postingan $Postingan){
        return view('Berita/DetailBerita',[
            'postingan'=>$Postingan
        ]);
    }
    public function Show(Request $request){
        if($request->search){
           if($request->op=='all') {
                 $nama=Postingan::paginate(10)->withQueryString();
                 $kategori='all';
           } else{
                 $nama=Postingan::where('kategori_id',$request->op)
                                 ->where('body','like','%'.$request->search.'%')->where('title','like','%'.$request->search.'%')->paginate(10)->withQueryString();
                 $kategori=Kategori::where('id',$request->op)->get();
                  foreach($kategori as $j){
                    $kategori=$j->id;
                  }
           }
        }
        return view('Berita/Berita',[
            'postingan'=>$nama,
            'Kategori'=>Kategori::all(),
            'kategorii'=>$kategori
        ]);
    }
}
