<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->integer('total');
            $table->string('statut');
            $table->text('motif');
            $table->integer('isvalider');
            $table->integer('isvalider1');
            $table->text('motif1');
            $table->integer('isvalider1');
            $table->text('motif1');
            $table->foreignId('idutilisateur')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('idclient')->constrained('clients')->onDelete('cascade');
            $table->foreignId('id_bon_commande')->constrained('bon_commandes')->onDelete('cascade');
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
        Schema::dropIfExists('bon_livraisons');
    }
}
