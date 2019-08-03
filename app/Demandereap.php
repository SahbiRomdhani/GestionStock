<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandereap extends Model
{
    protected $table= 'demande_reap';
    protected $fillable=[ 'magasin_id', 'date'];

    public function magasin(){
        return $this->belongsTo('App\magasin');
    }

}
