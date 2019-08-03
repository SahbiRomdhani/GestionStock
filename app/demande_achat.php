<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demande_achat extends Model
{
    //
    protected $table = 'demande_achat';
    protected $fillable=['magasin_id','etat','date'];


    public function magasin(){
        return $this->belongsTo('App\magasin');
    }
    
}
