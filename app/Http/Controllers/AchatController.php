<?php

namespace App\Http\Controllers;

use App\magasin;
use App\Produit;
use App\categorie;
use App\Fournisseur;
use App\demande_achat;
use App\ProduitDemandeAchat;
use Illuminate\Http\Request;
use DB;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $achats=demande_achat::orderBy('id','desc')->get();
        return view('achat.index',compact('achats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $magasins=magasin::all();
        $fournisseurs = Fournisseur::all();
        $products = Produit::all();
        $categories =categorie::all();
        return view('achat.create',compact('magasins', 'categories', 'fournisseurs', 'products'));
    }
/**
 * get Produit selon catégorie
 */
    public function getproducts(Request $request)
    {  
        //$id = $request->get(id);
        $products = DB::table('produits')->where('categorie_id', $request->id)->get();
        //dd($products);
        return  response($products); 
    }
    /**
     * get fournisseur selon produit
     */
    public function getfournisseurs(Request $request)
    {
        $product = Produit::find($request->id);
        $fournisseurs = $product->fournisseur()->get();
        return $fournisseurs;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeachat(Request $request)
    {

        $demande = new demande_achat();
        $demande->magasin_id = $request->id_magasin;
        $demande->date = $request->date_demande_achat;
        $demande->etat = "encours";
        $demande->save();

        $products = json_decode($request->products);
        // return $products[0]->id_product;


        foreach ($products as $value) {
            $produit = new ProduitDemandeAchat();
            $produit->produit_id = $value->id_product;
            $produit->quantite = $value->quantite;
            $produit->fournisseur_id = $value->id_fournisseur;
            $produit->demande_achat_id = $demande->id;
            $produit->save();
        }

        // return $demande->id;


        $request->session()->flash('success', 'Demande a été Ajouter ');
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
        $achat = demande_achat::find($id);
        return view('achat.show', compact('achat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {           
        $magasin=magasin::pluck('nom_magasin','id')->all();

        $achat = demande_achat::find($id);
        return view('achat.show',compact('achat','magasin'));
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
        

    }
    public function print()
    {
        $demandes = demande_achat::all();
        $entreprise = Fournisseur::find(1);
        $data = [
            'demandes' => $demandes,
            'entreprise' => $entreprise
        ];
        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('backend.GestionStock.Demandeachat.pdfview', $data);
        return $pdf->stream('demandesachat.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achat = demande_achat::find($id);
        $achat->delete();
        return redirect('achat')->with('success','Demande Achat Deleted');
    }
}
