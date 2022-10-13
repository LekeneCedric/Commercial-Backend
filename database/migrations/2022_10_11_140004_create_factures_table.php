<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('remise');
            $table->integer('etat');
            $table->integer('montant_totalHT');
            $table->integer('montant_totalTT');
            $table->integer('montant_tva');
            $table->integer('montant_autre');
            $table->integer('montant_remise');
            $table->text('description');
            $table->dateTime('dateenvoie');
            $table->string('lieu_livraison');
            $table->dateTime('delai_paiement');
            $table->foreignId('idproformat')->constrained('proformats')->onDelete('cascade');
            $table->foreignId('id_bon_livraison')->constrained('bon_livraisons')->onDelete('cascade');
            $table->foreignId('id_bon_commande')->constrained('bon_commandes')->onDelete('cascade');
            $table->foreignId('idclient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_mode_reglement')->constrained('mode_reglements')->onDelete('cascade');
            $table->foreignId('id_monnaie')->constrained('monnaies')->onDelete('cascade');
            $table->foreignId('idtva')->constrained('tvas')->onDelete('cascade');
            $table->foreignId('idcommerciaux')->constrained('commerciauxs')->onDelete('cascade');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade');
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
        Schema::dropIfExists('factures');
    }
}
