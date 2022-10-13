<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('nom');
            $table->string('email');
            $table->string('password');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('siteweb');
            $table->integer('etat');
            $table->text('evenement');
            $table->string('num_contri');
            $table->string('registre');
            $table->integer('isclient');
            $table->foreignId('idpays')->constrained('pays')->onDelete('cascade');
            $table->foreignId('idcategorie')->constrained('categories')->onDelete('cascade');
            $table->foreignId('idprospecteur')->constrained('prospecteurs')->onDelete('cascade');
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
        Schema::dropIfExists('prospects');
    }
}
