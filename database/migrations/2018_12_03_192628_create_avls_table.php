<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avls', function (Blueprint $table) {
          $table->increments('id');
          $table->string('noefaAliat');
          $table->string('olaviat')->nullable();
          $table->string('namesherkat');
          $table->string('namerabet')->nullable();
          $table->string('address');
          $table->string('codeposti')->nullable();
          $table->string('tel');
          $table->string('fax')->nullable();
          $table->string('namemodiramel')->nullable();
          $table->string('hamrah')->nullable();;
          $table->string('brand')->nullable();
          $table->string('email')->nullable();
          $table->string('website')->nullable();
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
        Schema::dropIfExists('avls');
    }
}
