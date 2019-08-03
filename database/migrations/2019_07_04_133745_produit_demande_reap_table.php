<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProduitDemandeReapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_demande_reap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('demande_reap_id')->unsigned();
            $table->bigInteger('produit_id')->unsigned();
            $table->string('quantite');
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
        Schema::dropIfExists('produit_demande_reap');
    }
}
