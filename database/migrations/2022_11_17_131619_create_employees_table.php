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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_am');
			$table->string('name_en')->nullable();
            $table->string('position_am')->nullable();
			$table->string('position_en')->nullable();
			$table->string('content_am')->nullable();
			$table->string('content_en')->nullable();
			$table->string('audio_am')->nullable();
			$table->string('audio_en')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
