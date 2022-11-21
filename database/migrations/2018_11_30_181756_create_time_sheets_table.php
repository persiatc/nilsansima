<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('assignment');
            $table->string('kaarfarma');
            $table->string('projectName');
            $table->string('startHour')->nullable();
            $table->string('endHour')->nullable();
            $table->string('minutes');
            $table->string('holdpoint');
            $table->text('result');
            $table->text('attach1');
            $table->text('attach2');
            $table->unsignedInteger('tdl_id')->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('time_sheets');
    }
}
