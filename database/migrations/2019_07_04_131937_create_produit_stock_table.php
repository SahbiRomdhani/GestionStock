<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('produit_id')->unsigned();
            $table->integer('bon_id')->unsigned()->index()->nullable();
            $table->string('bon_type');
            $table->bigInteger('magasin_id')->unsigned();
            $table->integer('quantite_initial');
            $table->double('prix_unitaire');
            $table->integer('quantite_actuel')->unsigned();
            $table->string('nbr_mois_garantie');


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
        Schema::dropIfExists('produit_stock');
    }
}
