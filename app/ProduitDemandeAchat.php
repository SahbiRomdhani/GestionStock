<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitDemandeAchat extends Model
{
    protected $table = 'produit_demande_achat';
    protected $fillable=[ 'demande_achat_id','produit_id','fournisseur_id','quantite'];

    public function fournisseur(){
        return $this->belongsTo('App\Fournisseur');
    }
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
    public function achat()
    {
        return $this->belongsTo('App\demande_achat', 'demande_achat_id', 'id');
    }

}
