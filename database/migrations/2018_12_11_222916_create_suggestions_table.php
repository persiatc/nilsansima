<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
          $table->increments('id');
          $table->text('description');
          $table->string('requestedFrom');
          $table->string('addedById');
          $table->string('addedByName');
          $table->string('scope');
          $table->string('status')->nullable();
          $table->string('attachment')->nullable();
          $table->string('doerDescription')->nullable();
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
        Schema::dropIfExists('suggestions');
    }
}
