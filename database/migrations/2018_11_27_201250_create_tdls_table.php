<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id'); //AssignedTo ID
            $table->unsignedInteger('assignerId');
            $table->string('assignerName');
            $table->string('priority');
            $table->string('status')->nullable();
            $table->string('holdPoint')->nullable();
            $table->text('doerDescription')->nullable();
            $table->string('jDate');
            $table->text('assignerAttachment')->nullable();
            $table->text('doerAttachment')->nullable();
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
        Schema::dropIfExists('tdls');
    }
}
