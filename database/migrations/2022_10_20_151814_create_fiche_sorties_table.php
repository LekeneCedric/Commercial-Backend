<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_sorties', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->foreignId('idcommercial')->constrained('commerciauxes')->onDelete('cascade');
		$table->foreignId('idarticle')->constrained('articles')->onDelete('cascade');
		$table->integer('quantite');
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
        Schema::dropIfExists('fiche_sorties');
    }
}
