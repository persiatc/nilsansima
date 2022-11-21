<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentOrderFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_order_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('PaymentOrderFormable');
            $table->unsignedInteger('user_id')->comment('ثبت کننده ');
            $table->string('project_manager')->nullable()->comment('مدیر  پروژه');
            $table->string('amount')->nullable()->comment('مبلغ به ریال');
            $table->string('to_buy')->nullable()->comment(' جهت خرید');
            $table->string('heading')->nullable()->comment('سرفصل');
            $table->string('code')->nullable()->comment('کد');
            $table->string('management_approval')->nullable()->comment('تایید مدیریت');
            $table->string('financial_management_approval')->nullable()->comment('تایید مدیریت مالی');
            $table->string('accounting_approval')->nullable()->comment('تایید حسابداری');
            $table->string('status')->nullable()->comment('وضعیت');

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
        Schema::dropIfExists('payment_order_forms');
    }
}
