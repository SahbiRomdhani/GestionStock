<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitDemandeAchatPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_demande_achat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('demande_achat_id')->unsigned();
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('fournisseur_id')->unsigned();
            $table->integer('quantite')->unsigned();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_demande_achat');
    }
}
