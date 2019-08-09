<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FournisseurRequest;
use App\Fournisseur;
class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $fournisseurs = Fournisseur::orderBy('id','desc')->paginate(7);
        return view('fournisseur.index',compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseur.create');

    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FournisseurRequest $request)
    {
        Fournisseur::create($request->all());
        return redirect('fournisseur')->with('Success','Fournisseur Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('fournisseur.edit',compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FournisseurRequest $request, $id)
    {
        //find and update
        $fournisseur = Fournisseur::find($id);
        $fournisseur->nom_fournisseur=$request->input('nom_fournisseur');
        $fournisseur->email=$request->input('email');
        $fournisseur->email_contact=$request->input('email_contact');
        $fournisseur->mat_fiscal=$request->input('mat_fiscal');
        $fournisseur->adresse=$request->input('adresse');
        $fournisseur->telephone=$request->input('telephone');
        $fournisseur->fax=$request->input('fax');
        $fournisseur->site_web=$request->input('site_web');
        $fournisseur->tel_contact=$request->input('tel_contact');
        $fournisseur->nom_contact=$request->input('nom_contact');
        $fournisseur->save();
        return redirect ('fournisseur')->with('success','Fournisseur Updated');



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
        
        $fournisseur=Fournisseur::find($id);
        $fournisseur->delete();
        return redirect('fournisseur')->with('success','User Deleted');
    }
}
