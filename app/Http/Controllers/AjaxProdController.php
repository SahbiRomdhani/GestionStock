<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\categorie;
use App\User;

class AjaxProdController extends Controller
{
    public function index(){
        //$categories = categorie::pluck('categorie', 'id');

        return view ('ajax.index');
    }
    public function readData(){
        $user = User::selectRaw(
            'id,name,email,password')
            ->get();
        return response($user);

    }
    public function store(Request $request)
    {   if( $request->ajax()){
            $user = User::create($request->all());
            return response($this->find($user->id));
             
        }
        
    }
    public function find($id){
       return User::selectRaw(
            'id,name,email,password,created_at'
        )
            ->where( 'id',$id)->first();
    }
    public function destroy(Request $request)
    {
        if ($request->ajax()) 
        {
        User::destroy($request->id);
        return response(['message'=>'Produit à ete Supprimé']);
        }
        
    }
    public function deuxtableaux()
    {
        $produits = Produit::join('categories', 'categories.id', '=', 'produits.categorie_id')
        ->selectRaw(
            'categories.categorie,produits.designation,produits.code_barre,
            produits.unite,produits.min_stock,produits.max_stock,produits.id'
        )
        ->get();
        return response($produits);
    }

}
