<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('onvan');
            $table->string('mozoo')->nullable();
            $table->string('peymankar');
            $table->string('mablagh')->nullable();
            $table->string('pardakht')->nullable();
            $table->string('moddat');
            $table->string('from');
            $table->string('to');
            $table->string('tazmin')->nullable();
            $table->string('nazer')->nullable();
            $table->string('status')->nullable();

            $table->string('description')->nullable();;
            $table->string('contractorFile')->nullable();;
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
        Schema::dropIfExists('purchase_requests');
    }
}
