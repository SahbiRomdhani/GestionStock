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

class BsortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bsortie=bsortie::orderBy('id','desc')->get();
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
            'produits.designation,produits.id,produit_stock.quantite_actuel,produit_stock.prix_unitaire'
            )->where('produit_id', $request->id)->get();
        return response($stocks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        bsortie::create($request->all());
        return redirect('bsortie');
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
        $sortie=bsortie::find($id);
        $sortie->delete();
        return redirect( route('bsortie.index'));
    }
    
}
