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
        Schema::create('zonesieges', function (Blueprint $table) {
            $table->id();
            $table->string('numsiege');
            $table->string('sectionstade');
            $table->enum('status', ['vide', 'occuper'])->default('vide');
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
        Schema::dropIfExists('zonesieges');
    }
};
