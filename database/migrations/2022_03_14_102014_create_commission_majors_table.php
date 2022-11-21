<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mozoo')->nullable()->comment('موضوع');
            $table->string('datebargozari')->nullable()->comment('تاریخ برگزاری مناقصه');
            $table->string('typemonaqese')->nullable()->comment('نوع مناقصه');
            $table->string('arzeshmoamele')->nullable()->comment('ارزش معامله');
            $table->string('tedadtaminkonandegan')->nullable()->comment('تعداد تامین کنندگان');
            $table->string('moshakhasatkala')->nullable()->comment('مشخصات کالا');
            $table->string('arzeshkala')->nullable()->comment('ارزش کالا');
            $table->string('mahaltahvil')->nullable()->comment('محل تحویل کالا');
            $table->string('hazinehaml')->nullable()->comment('هزینه حمل');
            $table->string('garanti')->nullable()->comment('گارانتی');
            $table->string('khadamatpasazforosh')->nullable()->comment('خدمات پس از فروش');
            $table->string('modatmoamele')->nullable()->comment('مدت معامله');
            $table->string('fileestelambaha')->nullable()->comment('فایل استعلام بها');
            $table->string('status_confirmation')->nullable()->comment('تایید کمیسیون');

            $table->unsignedInteger('user_id')->comment('ثبت کننده مناقصه');
            // $table->unsignedInteger('purchase_requests_id')->comment('شناسه درخواست خرید');

            $table->morphs('commissionable');
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
        Schema::dropIfExists('commission_majors');
    }
}