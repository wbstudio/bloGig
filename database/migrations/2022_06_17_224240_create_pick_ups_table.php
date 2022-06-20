<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('フロントには出ない');
            $table->integer('auther_id')->nullable()->comment('筆者ID');
            $table->integer('category_id')->nullable()->comment('カテゴリーID');
            $table->string('article_id')->nullable()->comment('記事ID');
            $table->integer('status')->nullable()->comment('ステータス');
            $table->integer('delete_flg')->comment('削除フラグ');
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
        Schema::dropIfExists('pick_ups');
    }
}
