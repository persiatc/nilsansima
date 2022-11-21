<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_companies', function (Blueprint $table) {
            $table->increments('id');

            $table->text('address')->nullable();
            $table->string('code_posti')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();

            $table->string('address_khoram')->nullable();
            $table->string('code_posti_khoram')->nullable();
            $table->string('phone_khoram')->nullable();
            $table->string('fax_khoram')->nullable();

            $table->string('shomare_sabt')->nullable();
            $table->string('shenase_meli')->nullable();
            $table->string('shomare_hesab_tejarat')->nullable();
            $table->string('shomare_shaba')->nullable();
            $table->string('code_eqtesadi')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

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
        Schema::dropIfExists('info_companies');
    }
}
