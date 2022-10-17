<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_bon_commande')->nullable()->default(null)->constrained('bon_commandes')->onDelete('cascade');
            $table->foreignId('id_bon_livraison')->nullable()->default(null)->constrained('bon_livraisons')->onDelete('cascade');
            $table->integer('iddevis')->default(0);
            $table->foreignId('idretour')->nullable()->default(null)->constrained('retours')->onDelete('cascade');
            $table->foreignId('idfacture')->constrained('factures')->onDelete('cascade');
            $table->foreignId('idproduit')->constrained('articles')->onDelete('cascade');
            $table->integer('idservice')->default(0);
            $table->integer('idsortiem')->default(0);
            $table->string('unite')->default("");
            $table->integer('quantite');
            $table->float('prix_unitaire');
            $table->integer('remise')->default(0);
            $table->float('total')->default(0);
            $table->float('tva')->default(0);
            $table->float('total_tt')->default(0);
            $table->integer('quantite_livree')->default(0);
            $table->string('observations')->default('RAS');
            $table->string('dateajout');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bon_produits');
    }
}
