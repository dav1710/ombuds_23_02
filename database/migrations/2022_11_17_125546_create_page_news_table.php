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
        Schema::create('page_news', function (Blueprint $table) {
            $table->integer('news_id')->unsigned();
            $table->integer('page_id')->unsigned();

            $table->foreign('news_id')->references('id')->on('news')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['news_id', 'page_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_news');
    }
};
