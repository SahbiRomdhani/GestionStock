<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use App\Produit;
use App\Fournisseur;
use App\categorie;
use DB;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $produits = Produit::orderBy('id','desc')->get();
        return view('produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
        $fournisseur= Fournisseur::pluck('nom_fournisseur','id')->all();
        $categorie= categorie::pluck('categorie','id')->all();
        return view('produits.create',compact('categorie','fournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
        $success = false;

        DB::beginTransaction();

        try {
            $produit = new Produit();
            $produit->designation = $request->input('designation');
            $produit->categorie_id = $request->input('categorie_id');

            $produit->code_barre = $request->input('code_barre');
            $produit->unite = $request->input('unite');
            $produit->max_stock = $request->input('max_stock');
            $produit->min_stock = $request->input('min_stock');
            if ($produit->save()) {
                $four_ids = $request->input('fournisseur_id');
                $produit->fournisseur()->sync($four_ids, false);
                $success = true;
            }
        } catch (\Exception $e) {
            // maybe log this exception, but basically it's just here so we can rollback if we get a surprise
        }
        if ($success) {
            DB::commit();
            return redirect(route('produit.index'))->with('success','Produit saved');
        } else{
            return redirect(route('produit.create'))->with('error', 'Produit not saved');

        }

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
        $categorie= categorie::pluck('categorie','id')->all();
        $fournisseur= Fournisseur::pluck('nom_fournisseur','id')->all();

        $produit = Produit::find($id);
        return view('produits.edit',compact('produit','categorie','fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, $id)
    {   
        //find produit and updated

        $produit= Produit::find($id);
        $produit->designation=$request->input('designation');
        $produit->categorie_id=$request->input('categorie_id');
        $produit->fournisseur_id=$request->input('fournisseur_id');

        $produit->code_barre=$request->input('code_barre');
        $produit->unite=$request->input('unite');
        $produit->max_stock=$request->input('max_stock');
        $produit->min_stock=$request->input('min_stock');
        
        $produit->save();





        // redirect with success msg
        return redirect(route('produit.index'))->with('success',' Produit Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $produit=Produit::find($id);
        $produit->delete();
        return redirect('produit')->with('success','User Deleted');
    }
}
