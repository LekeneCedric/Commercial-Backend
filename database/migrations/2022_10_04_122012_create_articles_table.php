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
            $table->integer('isnouveau');
            $table->integer('stock_min');
            $table->integer('stock_minb');
            $table->integer('stock_rea');
            $table->integer('stock_res');
            $table->foreignId('idfournisseur')->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('idmarque')->constrained('marques')->onDelete('cascade');
            $table->foreignId('idcategorie')->constrained('categories')->onDelete('cascade');
            $table->foreignId('idrayon')->constrained('rayons')->onDelete('cascade');
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
