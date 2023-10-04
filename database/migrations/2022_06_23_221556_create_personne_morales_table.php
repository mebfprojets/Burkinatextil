<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneMoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_morales', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale');
            $table->integer('type_es');
            $table->date('date_de_demarrage_activite');
            $table->date('date_de_formalisation');
            $table->string('numero_du_doc_de_reconnaissance');
            $table->string('numero_ifu');
            $table->integer('nbre_ass_homme');
            $table->integer('nbre_ass_femme');
            $table->integer('nbre_ass_jeune');
            $table->integer('nbre_emp_perm_homme');
            $table->integer('nbre_emp_perm_femme');
            $table->integer('nbre_emp_perm_jeune');
            $table->integer('nbre_temp_perm_homme');
            $table->integer('nbre_temp_perm_femme');
            $table->integer('nbre_tem_perm_jeune');
            $table->bigInteger('ca_2020');
            $table->bigInteger('ca_2021');
            $table->bigInteger('ca_2022');
            $table->integer('region')->nullable();
            $table->integer('province')->nullable();
            $table->integer('commune')->nullable();
            $table->integer('secteur')->nullable();
            $table->string('telephone');
            $table->string('email');
            $table->string('telephone_whatsap');
            $table->unsignedBigInteger('representant_id');
          
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
        Schema::dropIfExists('personne_morales');
        // Schema::dropForeign(['representant_id']);
    }
}
