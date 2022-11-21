<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->nullable()->comment('تعداد');
            $table->string('unit')->nullable()->comment('واحد');
            $table->bigInteger('unit_price')->nullable()->comment('قیمت واحد');
            $table->bigInteger('total_price')->nullable()->comment('جمع');
            $table->text('description')->nullable()->comment('شرح کالا');
            $table->bigInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices');

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
        Schema::dropIfExists('products');
    }
}
