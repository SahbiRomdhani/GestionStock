<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBLivraisonFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_livraison_facture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('demande_achat_id')->unsigned();
            $table->string('reference');
            $table->bigInteger('fournisseur_id')->unsigned();
            $table->string('date');
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
        Schema::dropIfExists('b_livraison_facture');
    }
}
