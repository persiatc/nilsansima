<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyworks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time')->nullable()->comment('مدت زمان');
            $table->text('result')->nullable()->comment('نتیجه');
            $table->string('assignment')->nullable()->comment('مربوط به کجا');
            $table->text('description')->nullable()->comment('شرح فعالیت');
            $table->time('start_time')->nullable()->comment('ساعت شروع');
            $table->time('end_time')->nullable()->comment('ساعت اتمام');
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
        Schema::dropIfExists('dailyworks');
    }
}
