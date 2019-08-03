<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bsortie extends Model
{
    protected $table='b_sortie';
    protected $fillable=['demande_reap_id','demande_maintenance_id','date'];

    public function reap(){
        return $this->belongsTo('App\Demandereap');
    }
    public function maintenance(){
        return $this->belongsTo('App\Maintenance');
    }


}
