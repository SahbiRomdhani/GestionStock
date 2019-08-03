<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProduitDemandeAchat;
use App\demande_achat;
use App\Produit;
use App\Fournisseur;



class ProduitDemandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $produitachats = ProduitDemandeAchat::orderBy('id','desc')->get();
        return view('achat.produitachat.index',compact( 'produitachats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $produit= Produit::pluck('designation','id')->all();
        $achat= demande_achat::pluck('date','id')->all();
        $fournisseur= Fournisseur::pluck('nom_fournisseur','id')->all();
        return view('achat.produitachat.create',compact( 'produit', 'achat', 'fournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProduitDemandeAchat::create( $request->all());
        return redirect(route('produitachat.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prduitachat=ProduitDemandeAchat::find( $id);
        $prduitachat->delete();
        
    }
}
