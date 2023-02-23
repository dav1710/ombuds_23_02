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
        Schema::create('links', function (Blueprint $table) {
			$table->string('hot_line')->nullable();
			$table->string('phone_am')->nullable();
            $table->string('phone_en')->nullable();
			$table->string('facebook')->nullable();
			$table->string('instagram')->nullable();
			$table->string('twitter')->nullable();
			$table->string('telegram')->nullable();
			$table->string('messenger')->nullable();
			$table->string('mail')->nullable();
			$table->string('web')->nullable();
            $table->string('web_name')->nullable();
			$table->string('location')->nullable();
            $table->string('location_am')->nullable();
            $table->string('location_en')->nullable();
			$table->string('e-gov')->nullable();
			$table->string('e-request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
};
