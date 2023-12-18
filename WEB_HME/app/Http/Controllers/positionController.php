<?php

namespace App\Http\Controllers;

use App\Models\position;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class positionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('position/position',[
            'active'=>'position',
            'post'=>position::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/position/insert',[
             'active'=>'position'
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
        $validate=$request->validate([
            'position_name'=>'required|max:255|unique:positions',
            'slug'=>'required|unique:positions'
        ]);
        position::create($validate);
        return redirect('/position')->with('insertSuccess','New positin has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(position $position)
    {
        return view('/position/edit',[
            'position'=>$position,
            'active'=>'position'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, position $position)
    {
        if($request->position_name != $position->position_name){
            $rules=[
                'position_name'=>'required|unique:positions|max:255'
            ];
        }else{
            $rules=[
                'position_name'=>'required|max:255'
            ];
        }

        if($request->slug !=$position->slug){
            $rules['slug']='required|unique:positions';
        }else{
            $rules['slug']='required';
        }
        $credential=$request->validate($rules);
        position::where('id',$position->id)->update($credential);
        return redirect('/position')->with('insertSuccess','Position has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(position $position)
    {
        position::destroy('id',$position->id);
        $n='Position '.$position->position_name.' has been deleted';
        return back()->with('insertSuccess',$n);
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(position::class, 'slug', $request->name);
        return response()->json(['slug'=> $slug]);
    }
}
