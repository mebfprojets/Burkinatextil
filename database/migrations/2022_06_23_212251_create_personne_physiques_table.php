<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnePhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_physiques', function (Blueprint $table) {
            $table->id();
            $table->string('code_personne')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->integer('nationalite');
            $table->integer('pays_de_residence');
            $table->string('numero_identite')->nullable();
            $table->string('niveau_instruction');
            $table->integer('region_residence')->nullable();
            $table->integer('province_residence')->nullable();
            $table->integer('commune_residence')->nullable();
            $table->integer('secteur_residence')->nullable();
            $table->string('telephone');
            $table->string('telephone_whatsap');
            $table->string('email');
            $table->integer('statut_professionnel')->nullable();
            $table->integer('type_contrat')->nullable();
            $table->integer('deja_participer_dispositif_dappui')->nullable();
            $table->string('dispositif_dappui')->nullable();
            $table->integer("entreprise_formalise")->nullable();
            $table->string("nom_entreprise")->nullable();
            $table->integer('nbre_emp_perm_homme')->nullable();
            $table->integer('nbre_emp_perm_femme')->nullable();
            $table->integer('nbre_temp_perm_homme')->nullable();
            $table->integer('nbre_temp_perm_femme')->nullable();
            $table->bigInteger('ca_2020');
            $table->bigInteger('ca_2021');
            $table->bigInteger('ca_2022');
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
        Schema::dropIfExists('personne_physiques');
    }
}
