<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('saderKonandeh')->nullable();
            $table->string('dateStart')->nullable();
            $table->string('moddateEtebar')->nullable();
            $table->string('dateEnd')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('dokumentations');
    }
}
