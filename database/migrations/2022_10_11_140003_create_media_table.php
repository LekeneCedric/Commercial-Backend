<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filePath');
            $table->string('extension');
            $table->string('fileName');
            $table->foreignId('article_id')->nullable()->default(null)->constrained('articles')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->default(null)->constrained('clients')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->nullable()->default(null)->constrained('utilisateurs')->onDelete('cascade');
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
        Schema::dropIfExists('media');
    }
}
