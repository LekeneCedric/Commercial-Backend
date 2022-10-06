<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('etat');
            $table->string('description');
            $table->string('lieu');
            $table->timestamp('delaipayement');
            $table->foreignId('commercial_id')->nullable()->default(null)->constrained('commercials')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->default(null)->constrained('clients')->onDelete('cascade');
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
        Schema::dropIfExists('factures');
    }
}
