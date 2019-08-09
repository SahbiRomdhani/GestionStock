<?php

namespace App\Http\Controllers;

use App\User;
use App\Produit;
use App\categorie;
use App\Fournisseur;
use App\ProduitStock;
use App\demande_achat;
use App\LivraisonFacture;
use Illuminate\Http\Request;
use App\Notifications\StockNot;
use App\Http\Requests\LivraisonRequest;

class LivraisonFactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $factures = LivraisonFacture::orderBy('id','desc')->paginate(7);
        return view('stock.facture.index',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = categorie::all();
        $achat= demande_achat::all();
        $fournisseur= Fournisseur::all();
        return view( 'stock.facture.create',compact('achat', 'fournisseur', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storelivraisonproduit(Request $request)
    {
        /**SAve livrainson Facture */
        $livraison= new LivraisonFacture();
        $livraison->demande_achat_id = $request->input('demande_achat_id');
        $livraison->date = $request->input('date');
        $livraison->reference = $request->input('reference');
        $livraison->fournisseur_id = $request->input('fournisseur_id');
        $livraison->save();

        $id = $livraison->id;
        $products = json_decode($request->products);
        /** Save Produit Dans le stock */
        foreach ($products as $value) {
            $prodstock = new ProduitStock();
            $prodstock->produit_id = $value->produit;
            $prodstock->magasin_id = $value->magasin;
            $prodstock->quantite_initial = $value->quantite;
            $prodstock->prix_unitaire = $value->prix;
            $prodstock->quantite_actuel = $value->quantite;
            $prodstock->nbr_mois_garantie = $value->garantie;
            // $prodstock->bon_type= "Livraison";
            // $prodstock->bon_id = $id;
            $livraison->stock()->save($prodstock);

            $prodstock->save();

            $user = auth()->user();
            $user->notify(new StockNot(ProduitStock::findOrfail($prodstock->id), (User::findOrfail($user->id))));

        }


        $request->session()->flash('success', 'Nouveau Produit Ajouter');
        return response()->json(['status' => 'Hooray']);        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $facture = LivraisonFacture::find($id);
        return view('stock.facture.show', compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $facture = LivraisonFacture::find($id);
        $facture->delete();
        return redirect()->back();

    }
}
