<?php

namespace App\Http\Controllers;

use App\bsortie;
use App\magasin;
use App\Demandereap;
use App\Maintenance;
use Illuminate\Http\Request;
use DB;
use App\ProduitReap;
use App\ProduitStock;
use App\ProduitSortie;

class BsortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bsortie=bsortie::orderBy('id','desc')->paginate(7);
        return view('stock.bille.bsortie.index',compact('bsortie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $magasin=magasin::all();
        $demandereap=Demandereap::all();
        $maintenance=Maintenance::all();
        return view( 'stock.bille.bsortie.create',compact('demandereap', 'maintenance', 'magasin', 'stocks'));

    }
    /**
    * get Demande selon magasin
    */
    public function getdemande(Request $request)
    {  
        //$id = $request->get(id);
        $demande = DB::table('demande_reap')->where('magasin_id', $request->id)->get();
        //dd($products);
        return  response($demande); 
    }
    /**
     * get Demande selon magasin
     */
    public function getproduitreap(Request $request)
    {
        //$id = $request->get(id);
        // $demandereap = ProduitReap::where('demande_reap_id', $request->id)->get();
        $demandereap = ProduitReap::join('produits', 'produits.id', '=', 'produit_demande_reap.produit_id')
            ->selectRaw(
            'produits.designation,produits.id,produit_demande_reap.demande_reap_id,produit_demande_reap.quantite'
            )->where('demande_reap_id', $request->id)->get();
        //dd($products);
        return  response($demandereap);
    }
    /*** GEt Produit selon Demande REap */
    public function getproduitdemande(Request $request){
        $stocks = ProduitStock::join('produits', 'produits.id', '=', 'produit_stock.produit_id')
            ->selectRaw(
            'produit_stock.id,produits.designation,produit_stock.quantite_actuel
            ,produit_stock.prix_unitaire,produits.id As produit_id'
            )->where([['produit_id', $request->id],['quantite_actuel' ,'>', 0]])->get();
        return response($stocks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesortie(Request $request)
    {
        $bsortie = new bsortie();
        $bsortie->demande_reap_id = $request->demande;
        $bsortie->reference = $request->reference;
        $bsortie->date = $request->date;
        $bsortie->save();
        $id = $bsortie->id;
        /** Save Produit Dans le stock */

        $products = json_decode($request->products);
        foreach ($products as $value) {
        $sortie=0;
        $produit = new ProduitSortie();
        $produit->produit_stock_id = $value->stock_id;
        //$produit->prix = $value->prix;
        $produit->quantite = $value->sortie;
        $produit->b_sotrie_id= $id;
        $produit->save();
        $stock_qunt = DB::table('produit_stock')->where([
        
            ['produit_id', '=', $value->idproduit],
            ['prix_unitaire', '=', $value->prix],

        ])->first()->quantite_actuel;
        $sortie=$stock_qunt-($value->sortie);
        //return $value->quantite;
        $table =DB::table('produit_stock')->where([
        
          ['produit_id', '=', $value->idproduit],
        ['prix_unitaire', '=', $value->prix],

        ])->update(['quantite_actuel' => $sortie]);

    }

 return $products;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sortie = bsortie::find($id);
        return view ('stock.bille.bsortie.show',compact('sortie'));
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
        $sortie=bsortie::find($id);
        $sortie->delete();
        return redirect( route('bsortie.index'));
    }
    
}
