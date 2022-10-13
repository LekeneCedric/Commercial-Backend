<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_bon');
            $table->string('delai');
            $table->integer('envoye');
            $table->integer('montant_totalHT');
            $table->integer('montant_totalTT');
            $table->text('description');
            $table->int('isvalider');
            $table->int('isvalider1');
            $table->int('isvalider2');
            $table->text('motif');
            $table->text('motif1');
            $table->text('motif2');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('idclient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_mode_reglement')->constrained('mode_reglements')->onDelete('cascade');
            $table->foreignId('idcondition')->constrained('conditions')->onDelete('cascade');
            $table->foreignId('idmonnaie')->constrained('monnaies')->onDelete('cascade');
            $table->foreignId('idagence')->constrained('agences')->onDelete('cascade');
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
        Schema::dropIfExists('bon_commandes');
    }
}
