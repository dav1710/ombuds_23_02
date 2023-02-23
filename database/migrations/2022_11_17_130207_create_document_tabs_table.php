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
        Schema::create('document_tabs', function (Blueprint $table) {
            $table->integer('document_id')->unsigned();
            $table->integer('tab_id')->unsigned();

            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tab_id')->references('id')->on('tabs')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['document_id', 'tab_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_tabs');
    }
};
