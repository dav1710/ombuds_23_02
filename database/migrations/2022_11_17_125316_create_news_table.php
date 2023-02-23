<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_am')->nullable();
            $table->string('title_en')->nullable();
            $table->text('content_am')->nullable();
            $table->text('content_en')->nullable();
            $table->string('file_am')->nullable();
            $table->string('file_en')->nullable();
            $table->string('audio_am')->nullable();
            $table->string('audio_en')->nullable();
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
        Schema::dropIfExists('news');
    }
};
