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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedDecimal('prix');
            $table->unsignedBigInteger('place_id');
            $table->timestamp('datevente')->useCurrent();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('match_id')->references('id')->on('matchs');
            $table->foreign('place_id')->references('id')->on('zonesieges');
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
        Schema::dropIfExists('ventes');
    }
};
