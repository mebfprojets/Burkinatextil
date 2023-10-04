<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDateDeFormalisationToPersonnePhysiques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personne_physiques', function (Blueprint $table) {
            $table->date('date_de_formalisation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnes_physiques', function (Blueprint $table) {
            $table->dropColumn('date_de_formalisation');
        });
    }
}
