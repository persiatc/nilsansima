<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('email')->unique();
          $table->string('name');
          $table->string('family');
          $table->string('password');
          $table->string('nationalCode');
          $table->string('groupName');
          $table->string('position');
          $table->string('mobileNumber');
          $table->string('lastLogin')->nullable();
          $table->string('lastAction')->nullable();
          $table->integer('twoStepCode')->nullable();
          $table->integer('isAdmin')->nullable();
          $table->integer('isDataEntry')->nullable();
          $table->integer('isDefaulPassword')->nullable()->default('1');
          $table->integer('Active')->nullable()->default('1');
          $table->string('avatar')->nullable();
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
