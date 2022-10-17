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
            $table->string('image')->default("");
            $table->integer('prix_achat');
            $table->boolean('stockable');
            $table->integer('isnouveau');
            $table->integer('stock_min')->default(0);
            $table->integer('stock_minb')->default(0);
            $table->integer('stock_rea')->default(0);
            $table->integer('stock_res')->default(0);
            $table->timestamp('dateajout')->nullable();
            $table->foreignId('idfournisseur')->nullable()->default(null)->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('idmarque')->nullable()->default(null)->constrained('marques')->onDelete('cascade');
            $table->foreignId('idcategorie')->nullable()->default(null)->constrained('categories')->onDelete('cascade');
            $table->foreignId('idrayon')->nullable()->default(null)->constrained('rayons')->onDelete('cascade');
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
