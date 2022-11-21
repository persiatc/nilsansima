<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_contracts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('onvan');
          $table->string('mozoo')->nullable();
          $table->string('tarafedovvom')->nullable();;
          $table->string('mablaghMahiane')->nullable();;
          $table->string('mablaghSaliane')->nullable();;
          $table->string('moddat');
          $table->string('from');
          $table->string('to');
          $table->string('pardakht')->nullable();;
          $table->string('davar')->nullable();;
          $table->string('description')->nullable();;
          $table->string('contractorFile');
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
        Schema::dropIfExists('seller_contracts');
    }
}
