<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\position;
use App\Models\member;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('/Member/Member',[
          'active'=>'anggota',
          'post'=>member::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Member/addMember',[
           'active'=>'anggota',
           'position'=>position::all(),
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
        $validateDate= $request->validate([
            'Img'=>'image|file|max:1000|required',
            'name'=>'required:max:255',
            'Jenis_kelamin'=>['required',Rule::in(['Laki-laki','Perempuan'])],
            'position_id'=>'required',
            'slug'=>'required|unique:members'
        ]);
        
        if($request->file('Img')){
            //jika ada gambar yang diuploud user maka tambhkana pada $credential maka tambahakan file teserbut ke direktori tapi namanya simpan di database
           $validateDate['Img']= $request->file('Img')->store('Foto_member');
        }
        member::create($validateDate);
        
        return redirect('/Member')->with('insertSuccess','New member has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $Member)
    {
        
        return view("/Member/editMember",[
            'active'=>'anggota',
            'position'=>position::all(),
            'member'=>$Member
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $Member)
    { 
        // dd($Member->Img);
        // dd($request->file('Img'));
        $rules=[
            'Img'=>'image|file|max:1000',
            'name'=>'required:max:255',
            'Jenis_kelamin'=>['required',Rule::in(['Laki-laki','Perempuan'])],
            'position_id'=>'required'
        ];
        if($request->slug != $Member->slug){
            $rules['slug']='required|unique:members';
        }else{
            $rules['slug']='required';
        }
        $credential=$request->validate($rules);
         if($request->file('Img')){
            if($Member->Img){
             Storage::delete($Member->Img);
            }
            $credential['Img']=$request->file('Img')->store('Foto_member');
         }
         member::where('id',$Member->id)->update($credential);
         return redirect('/Member')->with('insertSuccess','Berhasil melakukan update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $Member)
    {
        if($Member->Img){
            // $destination='img/'.$BeritaAdmin->image;
            // // Menghapus Gambar yang lama
            // File::delete($destination);
            // dibawah ini jika mememakai file symblik link
            Storage::delete($Member->Img);
        }
         //lalu delete data kan
         member::destroy($Member->id);
         $n="Member ".$Member->name." has been deleted!";
         return redirect('/Member')->with('insertSuccess',$n);
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(member::class, 'slug', $request->title);
        return response()->json(['slug'=> $slug]);
    }
}
