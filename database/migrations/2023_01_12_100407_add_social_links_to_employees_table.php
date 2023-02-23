<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinksToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('email')->after('img')->nullable();
            $table->string('twitter_link')->after('email')->nullable();
            $table->string('fb_link')->after('twitter_link')->nullable();
            $table->string('phone')->after('fb_link')->nullable();
            $table->string('audio2_am')->after('audio_en')->nullable();
            $table->string('audio2_en')->after('audio2_am')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('twitter_link');
            $table->dropColumn('fb_link');
            $table->dropColumn('audio2_am');
            $table->dropColumn('audio2_en');
            $table->dropColumn('phone');
        });
    }
}
