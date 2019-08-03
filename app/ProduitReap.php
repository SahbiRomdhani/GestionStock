<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitReap extends Model
{
    protected $table = 'produit_demande_reap';
    protected $fillable=['demande_reap_id', 'produit_id', 'quantite'];
    
    
    public function produit(){
        return $this->belongsTo('App\Produit');

    }

    public function reap()
    {
        return $this->belongsTo('App\Demandereap','demande_reap_id','id');
    }



}
