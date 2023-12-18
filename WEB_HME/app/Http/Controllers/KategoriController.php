<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//
        return view('/Admin/Kategori',[
           'Kategori'=>Kategori::all(),
           'active'=>'kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Admin/addKategori',[
            'active'=>'kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'name'=>'unique:kategoris|min:2|max:20|required',
            'slug'=>'unique:kategoris|required'
        ]);
        Kategori::create($validasi);
        return redirect('/Kategori')->with('insertSuccess','New category has been added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $Kategori)
    {
        return view('/Admin/EditKategori',[
            'Kategori'=>$Kategori,
            'active'=>'active'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $Kategori)
    {
        if($request->name != $Kategori->name){
            $rules=[
                'name'=>'required|unique:kategoris|max:255'
            ];
        }else{
            $rules=[
                'name'=>'required|max:255'
            ];
        }

        if($request->slug !=$Kategori->slug){
            $rules['slug']='required|unique:kategoris';
        }else{
            $rules['slug']='required';
        }
        $credential=$request->validate($rules);
        Kategori::where('id',$Kategori->id)->update($credential);
        return redirect('/Kategori')->with('insertSuccess','Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $Kategori)
    {
        Kategori::destroy('id',$Kategori->id);
        return back()->with('insertSuccess','Category has been deleted');
    } 

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->name);
        return response()->json(['slug'=> $slug]);
    }
}
