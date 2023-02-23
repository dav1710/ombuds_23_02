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
        Schema::create('ombudsmen', function (Blueprint $table) {
            $table->increments('id');
			$table->string('defender')->nullable();
			$table->string('img')->nullable();
            $table->string('name_am');
            $table->string('name_en');
            $table->string('subject_am')->nullable();
            $table->string('subject_en')->nullable();
            $table->longText('content_am')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('audio_am')->nullable();
            $table->string('audio_en')->nullable();
            $table->string('audio2_am')->nullable();
            $table->string('audio2_en')->nullable();
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
        Schema::dropIfExists('ombudsmen');
    }
};
