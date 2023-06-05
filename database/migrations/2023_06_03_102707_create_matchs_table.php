<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stade_id');
            $table->unsignedBigInteger('champions_id');
            $table->string('equipe_principale');
            $table->string('equipe_adverse');
            $table->date('date_match');
            $table->string('heure_match');
            $table->foreign('stade_id')->references('id')->on('stades');
            $table->foreign('champions_id')->references('id')->on('champions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchs');
    }
};
