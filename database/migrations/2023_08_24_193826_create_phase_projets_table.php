<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhaseProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_projets', function (Blueprint $table) {
            $table->id();
            $table->integer('projet_id')->nullable();
            $table->string('phase')->nullable();//Les phase possible Etudes techniques de faisabilité,Etude du marché 
            $table->string('statut')->nullable(); // Terminé,encours ...
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
        Schema::dropIfExists('phase_projets');
    }
}
