<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturedetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->integer('prixUnitaire');
            $table->integer('total');
            $table->foreignId('id_facture')->constrained('factures')->onDelete('cascade');
            $table->foreignId('id_article')->constrained('articles')->onDelete('cascade');
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
        Schema::dropIfExists('facturedetails');
    }
}
