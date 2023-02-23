<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('work_title_am')->nullable();
            $table->string('work_title_en')->nullable();
            $table->string('work_subject_am')->nullable();
            $table->string('work_subject_en')->nullable();
            $table->string('work_content_am')->nullable();
            $table->string('work_content_en')->nullable();
            $table->string('document_am')->nullable();
            $table->string('document_en')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
