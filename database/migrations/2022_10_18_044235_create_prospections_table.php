<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomPdv');
            $table->string('nom');
            $table->string('telephone');
            $table->string('categorie');
            $table->string('quartier');
            $table->text('observations');
            $table->foreignId('idcommerciaux')->nullable()->constrained('commerciauxes');
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
        Schema::dropIfExists('prospections');
    }
}
