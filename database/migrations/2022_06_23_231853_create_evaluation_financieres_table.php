<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationFinancieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_financieres', function (Blueprint $table) {
            $table->id();
            $table->integer('categorie');
            $table->string('designation');
            $table->bigInteger('cout');
            $table->bigInteger('fond_propre');
            $table->bigInteger('subvention_montant');
            $table->bigInteger('emprunt');
            $table->unsignedBigInteger('projet_id');
            $table->timestamps();
           // Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_financieres');
    }
}
