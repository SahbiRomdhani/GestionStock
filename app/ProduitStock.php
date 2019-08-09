<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'Livraison' => 'App\LivraisonFacture',
    'Entree' => 'App\Bentre',
]);

class ProduitStock extends Model
{
    use Notifiable;
    //

    protected $table='produit_stock';
    protected $fillable=['produit_id','type','magasin_id','quantite_initial','prix_unitaire','quantite_actuel','nbr_mois_garantie','bon_type','bon_id'];

    
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
 
    public function bon()
    {
        return $this->morphTo();
    }
    public function magasin()
    {
        return $this->belongsTo('App\magasin');
    }
}



