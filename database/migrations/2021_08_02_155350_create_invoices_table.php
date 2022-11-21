<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable()->comment('نام شرکت خریدار');
            $table->text('address')->nullable()->comment('آدرس خریدار');
            $table->string('phone')->nullable()->comment('تلفن خریدار');

            $table->string('No')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('validity')->nullable()->comment('اعتبار');
            $table->string('economic_code')->nullable()->comment('کد اقتصادی');
            $table->string('postal_code')->nullable()->comment('کد پستی');
            $table->string('national_code')->nullable()->comment('شناسه ملی');
            $table->string('registration_number')->nullable()->comment('شماره ثبت');
            $table->bigInteger('tax')->nullable()->comment('مالیاات بر ارزش افزوده');
            $table->unsignedInteger('user_id');
            $table->bigInteger('total')->nullable()->comment(' جمع به ریال');
            $table->bigInteger('final_total')->nullable()->comment('مبلغ کل پس از اعمال ارزش افزوده به ریال');

            $table->string('unique_code')->nullable()->comment('کد ویژه');


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
        Schema::dropIfExists('invoices');
    }
}
