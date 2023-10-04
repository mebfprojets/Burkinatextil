<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('region');
            $table->integer('province');
            $table->integer('commune');
           // $table->integer('village');
            $table->string('phase_actuelle_projet');
            $table->string('autre_phase_actuelle')->nullable();
            $table->integer('secteur_village');
            $table->string('description_projet', 500);
            $table->string('genese_projet', 500);
            //$table->string('resultat_attendu', 500);
           // $table->string('produit_service', 500);
            $table->unsignedBigInteger('personne_id');
          //  $table->foreign('personne_id')->references('id')->on('personne_physiques');
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
        Schema::dropIfExists('projets');
    }
}
