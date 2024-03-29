<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('intitule');
            $table->string('description');
            $table->foreignId('idclient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_facture')->constrained('factures')->onDelete('cascade');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade');
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
        Schema::dropIfExists('retours');
    }
}
