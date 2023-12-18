<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Postingan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Berita',[
             'active'=>'berita',
              'post'=>Postingan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/BuatBerita',[
            'active'=>'berita',
            'categories'=>Kategori::all()
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
        
        $credential=$request->validate([
               'title'=>'required|max:255',
                'slug'=>'required|unique:postingans',
                'kategori_id'=>'required',
                'body'=>'required',
             // ukuraan nya memakae kb jadinya 1024 kb
            'image'=>'image|file|max:100'
        ]);
        if($request->file('image')){
            //jika ada gambar yang diuploud user maka tambhkana pada $credential maka tambahakan file teserbut ke direktori tapi namanya simpan di database
           $credential['image']= $request->file('image')->store('post-images');
        }
        $credential['user_id']=auth()->user()->id;
        //Str::limit dipake untuk mengambil / memotong kata 
        //strip_tags dipake untuk mereset tag html menjadi tidak ada tag html
        $credential['excerpt']=Str::limit(strip_tags($request->body),200);
        //lalu insert kan
        Postingan::create($credential);
        
        return redirect('/BeritaAdmin')->with('insertSuccess','New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function show(Postingan $BeritaAdmin)
    {
         
        return view('Admin/show',[
            'post'=>$BeritaAdmin,
            'active'=>''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function edit(Postingan $BeritaAdmin)
    {
        // dd($BeritaAdmin);
        return view('Admin/Edit',[
            'post'=>$BeritaAdmin,
            'categories'=>Kategori::all(),
            'active'=>''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postingan $BeritaAdmin)
    {
        $rules=[
            'title'=>'required|max:255',
            'kategori_id'=>'required',
            'image'=>'image|file|max:100',
            'body'=>'required'
        ];
      

        // jika ada slug yang baru dengan  tidak sama dengan slug yang lama berarti slug nya berubah maka kasih validate 
        if($request->slug != $BeritaAdmin->slug){
            $rules['slug']  = 'required|unique:postingans';
        }
        
        $validateDate= $request->validate($rules);
        if($request->file('image')){
            //jika ada gambar lama dan menambhkan gambar baru
            if($request->OldImage){
                // Menghapus Gambar yang lama
                Storage::delete($request->OldImage);
            }
            //jika ada gambar yang diuploud user maka tambhkana pada $credential maka tambahakan file teserbut ke direktori tapi namanya simpan di database
            $validateDate['image']= $request->file('image')->store('post-images');
        }
        $validateDate['user_id']=auth()->user()->id;
        //Str::limit dipake untuk mengambil / memotong kata 
        //strip_tags dipake untuk mereset tag html menjadi tidak ada tag html
        $validateDate['excerpt']=Str::limit(strip_tags($request->body),200);

        //Update table post dengan id yang sama dengan post->id
        Postingan::where('id',$BeritaAdmin->id)->update($validateDate);
        
        return redirect('/BeritaAdmin')->with('insertSuccess','Post has been updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postingan $BeritaAdmin)
    {
        if($BeritaAdmin->image){
            // $destination='img/'.$BeritaAdmin->image;
            // // Menghapus Gambar yang lama
            // File::delete($destination);
            // dibawah ini jika mememakai file symblik link
            Storage::delete($BeritaAdmin->image);
        }
         //lalu delete data kan
         Postingan::destroy($BeritaAdmin->id);
        
         return redirect('/BeritaAdmin')->with('insertSuccess','Post has been deleted!');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Postingan::class, 'slug', $request->title);
        return response()->json(['slug'=> $slug]);
    }
    public function akun(){
       return view('/Akun/Sandi',[
                'active'=>'sandi'
            ]);
    }
    public function password(Request $request, User $User){
      $n=password_verify($request->passwordlama,$User->password);
        if($n==false){
            return back()->with('failed','Kesalahan password admin');
        }
          $request->validate([
           'passwordlama'=>'required|same:pas|max:15',
           'pas'=>'required|max:15|same:passwordlama',
           'pw'=>'required|max:15|same:password',
           'password'=>'required|max:15|same:pw'
          ]);
         
         $credential['name']=$User->name;
         $credential['username']=$User->username;
         $credential['email']=$User->email;
         $credential['slug']=$User->slug;
         $credential['password']=bcrypt($request->password);
         User::where('id',$User->id)->update($credential);

         return back()->with('sukses','Berhasil mengubah password');
        
    }

    public function profil(){
      return view('/Profil/profil',[
       'user'=>User::first(),
       'active'=>'Profil'
      ]);
    }
   public function profilupdate(Request $request,User $User){
    // dd($request->OldImage);
       $validateDate= $request->validate([
            'img'=>'image|file|max:500',
            'name'=>'required:max:255',
            'username'=>'required|max:15',
            'email'=>'required|max:255'
        ]);
    if($request->file('img')){
        //jika ada gambar lama dan menambhkan gambar baru
        if($request->OldImage){
            // Menghapus Gambar yang lama
            Storage::delete($request->OldImage);
        }
        //jika ada gambar yang diuploud user maka tambhkana pada $credential maka tambahakan file teserbut ke direktori tapi namanya simpan di database
        $validateDate['img']= $request->file('img')->store('Foto_admin');
    }
     User::where('id', $User->id)->update($validateDate);
     return back()->with('sukses','Berhasil mengubah biodata');
   }

}
