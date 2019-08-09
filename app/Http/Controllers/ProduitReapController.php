<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProduitReap;
use App\Demandereap;
use App\Produit;

class ProduitReapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $produitreaps=ProduitReap::orderBy('id','desc')->paginate(7);
        return view('demande.produitreap.index',compact('produitreaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demandereap=Demandereap::pluck('date','id')->all();
        $produit=Produit::pluck('designation','id')->all();
        return view('demande.produitreap.create',compact('demandereap', 'produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProduitReap::create($request->all());
        return redirect()->route('produitreap.index');
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
        $prod=ProduitReap::find($id);
        $prod->delete();
        return view('produitreap.index');

        
    }
}
