<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_guarantees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable()->comment('نوع ضمانت نامه');
            $table->string('subject')->nullable()->comment('موضوع قرارداد');
            $table->string('status')->nullable()->comment('اخرین وضعیت ');
            $table->string('active_status')->nullable()->comment(' وضعیت فعال');
            $table->string('validity_duration')->nullable()->comment('مدت اعتبار');

            $table->string('name_of_issuing_bank')->nullable()->comment('نام بانک صادر کننده');
            $table->string('beneficiary_name')->nullable()->comment('نام ذینفع');
            $table->string('image')->nullable()->comment('تصویر ضمانت نامه');
            $table->bigInteger('price')->nullable()->comment(' مبلغ به ریال');
            $table->timestamp('end_date')->nullable()->comment('تاریخ اتمام');
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
        Schema::dropIfExists('financial_guarantees');
    }
}
