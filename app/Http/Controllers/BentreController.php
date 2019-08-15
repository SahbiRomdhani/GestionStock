<?php

namespace App\Http\Controllers;

use App\User;
use App\bentre;
use App\bsortie;
use App\magasin;
use App\categorie;
use App\ProduitStock;
use Illuminate\Http\Request;
use App\Notifications\StockNot;

class BentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $entre=bentre::orderBy('id','desc')->paginate(7);
        return view('stock.bille.index',compact('entre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $sortie=bsortie::all();
        $magasin=magasin::all();
        $categories = categorie::all();

        return view('stock.bille.create',compact('sortie','magasin', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** SAve Bon de Entree */
        $bentre= new Bentre();
        $bentre->magasin_id=$request->magasin_id;
        $bentre->b_sortie_id = $request->b_sortie_id;
        $bentre->date = $request->date;
        $bentre->save();
        $id = $bentre->id;
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
            // $prodstock->bon_type = "Entree";
            // $prodstock->bon_id = $id;
            $bentre->stock()->save($prodstock);
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
        $entree = bentre::find($id);
        return view('stock.bille.show',compact('entree'));
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
        //
    }
}
