<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitSortie extends Model
{
    protected $table= 'produit_b_sortie';
    protected $fillable=[ 'b_sotrie_id', 'produit_stock_id', 'quantite'];



    public function stock()
    {
        return $this->hasOne('App\ProduitStock');
    }
    public function sortie()
    {
        return $this->hasOne('App\Produit');
    }



}
