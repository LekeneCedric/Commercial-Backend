<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProformatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proformats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('remise');
            $table->integer('envoye');
            $table->integer('montant_totalHT');
            $table->integer('montant_totalHTA');
            $table->integer('montant_totalTT');
            $table->integer('montant_remise');
            $table->integer('montant_tva');
            $table->string('description');
            $table->string('lieu_livraison');
            $table->dateTime('delai_livraison');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('idagence')->constrained('agences')->onDelete('cascade');
            $table->foreignId('idclient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_mode_reglement')->constrained('mode_reglements')->onDelete('cascade');
            $table->foreignId('idcondition')->constrained('conditions')->onDelete('cascade');
            $table->foreignId('idtva')->constrained('tvas')->onDelete('cascade');
            $table->foreignId('idmonnaie')->constrained('monnaies')->onDelete('cascade');
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
        Schema::dropIfExists('proformats');
    }
}
