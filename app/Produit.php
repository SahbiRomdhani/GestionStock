<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';
    protected $fillable = ['designation','categorie_id','code_barre','unite','min_stock','max_stock','fournisseur_id'];


    public function categorie(){
        return $this->belongsTo('App\categorie');
    }
    public function fournisseur(){
        return $this->belongsToMany('App\Fournisseur');
    }

}
