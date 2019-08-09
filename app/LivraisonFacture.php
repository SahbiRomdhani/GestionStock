<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivraisonFacture extends Model
{
    //
    protected $table = 'b_livraison_facture';
    protected $fillable=['demande_achat_id','reference','fournisseur_id','date'];

  
    public function stock()
    {
        return $this->morphMany('App\ProduitStock','bon');
    }

    public function fournisseur(){
        return $this->belongsTo('App\Fournisseur');
    }

    public function achat()
    {
        return $this->belongsTo('App\demande_achat', 'demande_achat_id', 'id');
    }
}
