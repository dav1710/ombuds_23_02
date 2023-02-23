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
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page');
            $table->string('title_am')->nullable();
            $table->string('title_en')->nullable();
            $table->string('content_am')->nullable();
            $table->string('content_en')->nullable();
            $table->string('subject_am')->nullable();
            $table->string('subject_en')->nullable();
            $table->string('file_am')->nullable();
			$table->string('file_en')->nullable();
			$table->string('file2_am')->nullable();
			$table->string('file2_en')->nullable();
			$table->string('file3_am')->nullable();
			$table->string('file3_en')->nullable();
            $table->string('document_am')->nullable();
			$table->string('document_en')->nullable();
            $table->string('document_title_am')->nullable();
			$table->string('document_title_en')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
