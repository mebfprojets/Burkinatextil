<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonneMoralesIdColumnToPiecejointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('piecejointes', function (Blueprint $table) {
            $table->integer("personne_morales_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('piecejointes', function (Blueprint $table) {
            $table->dropColumn('personne_morales_id');
        });
    }
}
