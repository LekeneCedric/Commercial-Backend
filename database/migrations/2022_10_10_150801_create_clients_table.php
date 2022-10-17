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
            $table->foreignId('idpays')->constrained('pays')->onDelete('cascade');
            $table->foreignId('idcategorie')->constrained('categories')->onDelete('cascade');
            $table->integer('type');
            $table->string('code')->nullable()->default("");
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('password');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->string('siteweb')->nullable()->default("");
            $table->string('num_contri')->nullable()->default("");
            $table->string('registre')->nullable()->default("");
            $table->string('logo')->nullable()->default("");
            $table->string('boite_postal')->nullable()->default("");
            $table->string('mot_cle')->nullable()->default("");
            $table->text('description')->nullable()->default("");
            $table->string('domaine_activite');
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
