<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_fournisseur');
            $table->string('mat_fiscal');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('site_web');
            $table->string('nom_contact');
            $table->string('tel_contact');
            $table->string('email_contact');
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
        Schema::dropIfExists('fournisseurs');
    }
}
