<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortToTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->enum('sort_tabs', ['files', 'news', 'pages'])->after('name_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->dropColumn('sort_tabs');
        });
    }
}
