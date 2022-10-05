<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('reference');
            $table->integer('quantite');
            $table->string('description');
            $table->integer('prix');
            $table->integer('prix_achat');
            $table->boolean('stockable');
            $table->dateTime('dateajout');
            $table->integer('stock_securite');
            $table->integer('stock_restant');
            $table->integer('stock_realise');
            $table->foreignId('id_fournisseur')->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('id_marque')->constrained('marques')->onDelete('cascade');
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}