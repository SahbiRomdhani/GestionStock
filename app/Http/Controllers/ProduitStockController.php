<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Bentre;
use App\magasin;
use App\Produit;
use App\categorie;
use App\ProduitStock;
use App\LivraisonFacture;
use Illuminate\Http\Request;
use App\Notifications\StockNot;
use Illuminate\Support\Facades\Input;

class ProduitStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits  = ProduitStock::orderBy('id', 'desc')->get();
        return view('stock.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createstock($id, $type)
    {
        $produit = Produit::pluck('designation', 'id')->all();
        $categories= categorie::all();

        return view('stock.create', compact('produit', 'id', 'type', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storestock(Request $request)
    {
        if ($request->ajax()) {
            $livraison = LivraisonFacture::find($request->id);
            $bentre = Bentre::find($request->id);
            
            $products = json_decode($request->products);
            // return $products[0]->id_product;

            foreach ($products as $value) {
                $prodstock = new ProduitStock();
                $prodstock->produit_id = $value->produit;
                $prodstock->magasin_id = $value->magasin;
                $prodstock->quantite_initial = $value->quantite;
                $prodstock->prix_unitaire = $value->prix;
                $prodstock->quantite_actuel = $value->quantite;
                $prodstock->nbr_mois_garantie = $value->garantie;
                $type = $value->type;
                

                if ($type == 'App\LivraisonFacture') {
                    $livraison->stock()->save($prodstock);
                } else if ($type == 'App\Bentre') {
                    $bentre->stock()->save($prodstock);
                }
                $prodstock->save();
         

            }
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
        $stock = ProduitStock::find($id);
        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        /* insert Data */
        $produit = Produit::pluck('designation', 'id')->all();
        $magasin = magasin::pluck('nom_magasin', 'id')->all();
        $entree = Bentre::pluck('date', 'id')->all();
        $facture = LivraisonFacture::pluck('date', 'id')->all();
        /* find ID */
        $stock = ProduitStock::find($id);
        return view('stock.edit', compact('stock', 'produit', 'magasin', 'entree', 'facture'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = ProduitStock::find($id);
        $stock->delete();
        session()->flash('success', 'Suppréssion Avec Succés!');
        return redirect('produitstock');
    }
    public function fillproduit()
    {

        $prod = Produit::selectRaw('id,designation')->get();
        return response($prod);
    }
}
