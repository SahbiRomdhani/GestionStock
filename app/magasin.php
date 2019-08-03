<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class magasin extends Model
{
    
    protected $table = 'magasins';
    protected $fillable = ['nom_magasin','adresse','telephone','categorie','type','user_id'];

    public function user(){
        return $this->belongsTo('App\User');

    }

    public function achat(){
        return $this->hasMany('App\demande_achat');
    }

}
