<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFileTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_file_tabs', function (Blueprint $table) {
            $table->integer('media_file_id')->unsigned();
            $table->integer('tab_id')->unsigned();

            $table->foreign('media_file_id')->references('id')->on('media_files')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tab_id')->references('id')->on('tabs')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['media_file_id', 'tab_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_file_tabs');
    }
}
