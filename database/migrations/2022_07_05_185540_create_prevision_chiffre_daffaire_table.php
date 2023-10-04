<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevisionChiffreDaffaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prevision_chiffre_daffaires', function (Blueprint $table) {
            $table->id();
            $table->string("produit");
            $table->string("unite_de_mesure");
            $table->bigInteger("quantite");
            $table->bigInteger("cout_unit");
            $table->unsignedBigInteger('projet_id');
           // $table->foreign('projet_id')->references('id')->on('projets');
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
        Schema::dropIfExists('prevision_chiffre_daffaire');
    }
}
