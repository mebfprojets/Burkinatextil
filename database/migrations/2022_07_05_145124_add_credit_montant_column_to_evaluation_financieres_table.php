<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreditMontantColumnToEvaluationFinancieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_financieres', function (Blueprint $table) {
            $table->bigInteger("credit_montant")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluation_financieres', function (Blueprint $table) {
            $table->dropColumn("credit_montant");
        });
    }
}
