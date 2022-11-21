<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('PurchaseRequestFormable');
            $table->text('description')->nullable()->comment('شرح کالا');
            $table->integer('number')->nullable()->comment('مقدار');
            $table->string('unit')->nullable()->comment('مقیاس واحد');
            $table->string('cost_center')->nullable()->comment('مرکز هزینه');
            $table->string('Date_required')->nullable()->comment('تاریخ نیاز');
            $table->bigInteger('unit_price')->nullable()->comment('قیمت براوردی');
            $table->text('Explanation')->nullable()->comment('توضیح');
            $table->bigInteger('total_price')->nullable()->comment('جمع');
            $table->unsignedInteger('user_id')->comment('ثبت کننده ');
            $table->string('status')->nullable()->comment('وضعیت');

            $table->string('Project_unit_manager_approval')->nullable()->comment('مدیر واحد متقاضی/ پروژه');
            $table->string('warehouse_keeper_approval')->nullable()->comment('تایید انباردار');
            $table->string('financial_management_approval')->nullable()->comment('تایید مدیریت مالی');
            $table->string('management_approval')->nullable()->comment('تایید مدیریت');


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
        Schema::dropIfExists('purchase_request_forms');
    }
}
