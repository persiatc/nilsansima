<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exporterName')->nullable()->comment('نام صادر کننده');
            $table->string('subject')->nullable()->comment('موضوع');
            $table->text('file')->nullable()->comment('فایل');
            $table->unsignedInteger('user_id');
            $table->timestamp('issueDate')->nullable()->comment('تاریخ صدور');
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
        Schema::dropIfExists('consents');
    }
}
