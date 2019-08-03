<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //
    protected $table='fournisseurs';


    protected $fillable = ['nom_fournisseur','email','email_contact','mat_fiscal',
    'adresse','telephone','fax','site_web','tel_contact','nom_contact','email_contact'];
    public function produits()
    {
        return $this->belongsToMany('App\Produit');
    }
}
