<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MagasinRequest;
use App\magasin;
use App\User;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $magasins = magasin::orderBy('id','desc')->get();
        return view('magasin.index',compact('magasins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = User::pluck('name','id')->all();
        return view('magasin.create',compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MagasinRequest $request)
    {
        magasin::create($request->all());
        return redirect('magasin')->with('Success','Magasin Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {          


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::pluck('name','id')->all();

        $magasin = magasin::find($id);
        return view('magasin.edit',compact('magasin','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MagasinRequest $request, $id)
    {
        
        //find magasin and updated

        $magasin= magasin::find($id);
        $magasin->nom_magasin=$request->input('nom_magasin');
        $magasin->telephone=$request->input('telephone');
        $magasin->adresse=$request->input('adresse');
        $magasin->categorie=$request->input('categorie');
        $magasin->type=$request->input('type');
        $magasin->user_id=$request->input('user_id');
        $magasin->save();
        return redirect('magasin.index')->with('success','Magasin Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $magasin=magasin::find($id);
        $magasin->delete();
        return redirect('magasin')->with('success','User Deleted');
    }
}
