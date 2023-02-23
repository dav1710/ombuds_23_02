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
        Schema::create('static_texts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('page');
            $table->string('title_am')->nullable();
            $table->string('title_en')->nullable();
            $table->string('subject_am')->nullable();
            $table->string('subject_en')->nullable();
            $table->longText('content_am')->nullable();
            $table->longText('content_en')->nullable();
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
        Schema::dropIfExists('static_texts');
    }
};
