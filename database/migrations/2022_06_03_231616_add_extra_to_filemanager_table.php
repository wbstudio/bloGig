<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraToFilemanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filemanager', function (Blueprint $table) {
            //
            $table->text('extra')->charset(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filemanager', function (Blueprint $table) {
            //
            $table->dropColumn('extra');  //カラムの削除
        });
    }
}
