<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->string('code');
            $table->string('password');
            $table->string('adresse');
            $table->string('ville');
            $table->string('siteweb');
            $table->string('num_contri');
            $table->string('registre');
            $table->string('logo');
            $table->string('mot_cle');
            $table->text('description');
            $table->string('domaine_activite');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email');
            $table->string('entreprise');
            $table->foreignId('idpays')->constrained('pays')->onDelete('cascade');
            $table->foreignId('idcategorie')->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
