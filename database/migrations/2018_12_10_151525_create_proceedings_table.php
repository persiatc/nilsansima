<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceedings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('number')->nullable();
            $table->string('MeetingType');
            $table->string('status');
            $table->string('radifeMosavvabe')->nullable();
            $table->string('sharheMoavvabe');
            $table->string('eghdamKonande');
            $table->string('mohlateEghdam')->nullable();
            $table->string('natijeh')->nullable();
            $table->string('fileSooratJalase')->nullable();
            $table->string('fileMostanadat')->nullable();
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
        Schema::dropIfExists('proceedings');
    }
}
