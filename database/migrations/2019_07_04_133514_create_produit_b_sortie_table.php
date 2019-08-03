<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitBSortieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_b_sortie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('b_sotrie_id')->unsigned();
            $table->bigInteger('produit_stock_id')->unsigned();
            $table->integer('quantite');


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
        Schema::dropIfExists('produit_b_sortie');
    }
}
