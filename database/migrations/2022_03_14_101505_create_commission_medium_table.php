<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionMediumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_medium', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mozoo')->nullable()->comment('موضوع');
            $table->string('darkhastkonande')->nullable()->comment('درخواست کننده');
            $table->string('filemadarek')->nullable()->comment('فایل مدارک');
            $table->string('tedadtaminkonandegan')->nullable()->comment('تعداد تامین کنندگان');

            $table->string('nametaminkonandegan')->nullable()->comment('اسامی تامین کنندگان');
            $table->string('moshakhasatkala')->nullable()->comment('مشخصات کالا');
            $table->string('arzeshkala')->nullable()->comment('ارزش کالا');
            $table->string('mahaltahvil')->nullable()->comment('محل تحویل کالا');
            $table->string('hazinehaml')->nullable()->comment('هزینه حمل');
            $table->string('garanti')->nullable()->comment('گارانتی');
            $table->string('khadamatpasazforosh')->nullable()->comment('خدمات پس از فروش');
            $table->string('zamantahvil')->nullable()->comment('حداکثر زمانبندی تحویل');
            $table->string('fileestelambaha')->nullable()->comment('فایل استعلام بها');
            $table->string('status_confirmation')->nullable()->comment('تایید کمیسیون');

            $table->unsignedInteger('user_id')->comment('ثبت کننده مناقصه');
            $table->unsignedInteger('purchase_requests_id')->comment('شناسه درخواست خرید');

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
        Schema::dropIfExists('commission_medium');
    }
}
