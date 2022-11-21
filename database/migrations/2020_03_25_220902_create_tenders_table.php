<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('addedById');
            $table->string('type');
            $table->string('karshenasDaryaft');
            $table->string('nahveDaryaft');
            $table->string('monagheseGozar');
            $table->string('mozoo');
            $table->string('codeMonagheseGozar');
            $table->string('codeSamaneSetadIran');
            $table->string('dateRecieved');
            $table->text('peyvastDaryafti');
            $table->string('timeJalasePorseshPasokh');
            $table->string('mohlat');
            $table->string('tarikhBazgoshaei');
            $table->string('namePhoneKarfarma');
            $table->string('mablaghZemanat');
            $table->string('moddatGharardad');
            $table->string('nazarieKomisionTavan');
            $table->string('karshenasPaygiri');
            $table->string('mablaghEstelam');
            $table->string('tasvirZemanat');
            $table->string('tasvirPishnahadFanni');
            $table->string('tasvirPishnahadGheymat');
            $table->text('attachmentErsali');
            $table->string('natijeMonaghese');
            $table->string('paasokhKarfarma');
            $table->string('akharinEghdamat');
            $table->string('tarikhEsterdadZemanat');
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
        Schema::dropIfExists('tenders');
    }
}
