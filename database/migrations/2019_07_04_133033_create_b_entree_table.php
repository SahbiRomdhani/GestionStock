<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBEntreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_entree', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('b_sortie_id')->unsigned();
            $table->bigInteger('magasin_id')->unsigned();
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
        Schema::dropIfExists('b_entree');
    }
}
