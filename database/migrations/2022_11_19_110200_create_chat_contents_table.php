<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chat_id');
            // $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->unsignedInteger('sender_id');
            // $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('receiver_id');
            // $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('content')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('chat_contents');
    }
}
