<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bentre extends Model
{
    //
    protected $table='b_entree';
    protected $fillable=['b_sotrie_id','magasin_id','date'];


    public function stock()
    {
        return $this->morphMany('App\ProduitStock', 'bon');
    }

    public function magasin(){
        return $this->belongsTo('App\magasin');
    }
    
    public function sortie()
    {
        return $this->belongsTo('App\bsortie');
    }


}


