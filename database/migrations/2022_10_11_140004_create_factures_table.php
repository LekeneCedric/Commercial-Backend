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
            $table->string('dateenvoie')->default('');
            $table->string('lieu_livraison');
            $table->string('delai_paiement')->default('');
            $table->foreignId('idproformat')->nullable()->default(null)->constrained('proformats')->onDelete('cascade');
            $table->foreignId('id_bon_livraison')->nullable()->default(null)->constrained('bon_livraisons')->onDelete('cascade');
            $table->foreignId('id_bon_commande')->nullable()->default(null)->constrained('bon_commandes')->onDelete('cascade');
            $table->foreignId('idclient')->nullable()->default(null)->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_mode_reglement')->nullable()->default(null)->constrained('mode_reglements')->onDelete('cascade');
            $table->foreignId('idmonnaie')->nullable()->default(null)->constrained('monnaies')->onDelete('cascade');
            $table->foreignId('idtva')->nullable()->default(null)->constrained('tvas')->onDelete('cascade');
            $table->foreignId('idcommerciaux')->nullable()->default(null)->constrained('commerciauxes')->onDelete('cascade');
            $table->foreignId('idutilisateur')->nullable()->default(null)->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('idagence')->nullable()->default(null)->constrained('agences')->onDelete('cascade');
            $table->integer('idautre')->nullable()->default(null);
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
