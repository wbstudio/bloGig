<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('タイトル');
            $table->text('main')->nullable()->comment('本文');
            $table->text('heading')->nullable()->comment('一覧での見出し');
            $table->string('eyecatch')->nullable()->comment('アイキャッチ画像');
            $table->string('auther')->comment('著者');
            $table->string('category')->nullable()->comment('著者のカテゴリー');
            $table->integer('main_category')->nullable()->comment('全体でのカテゴリー');
            $table->integer('channel')->nullable()->comment('you tubeチャンネル');
            $table->string('tag')->nullable()->comment('タグ');
            $table->integer('status')->comment('公開状態'); 
            $table->dateTime('release_at')->comment('公開時間');
            $table->dateTime('end_at')->comment('公開終了時間');
            $table->integer('count')->comment('閲覧数');
            $table->integer('good')->comment('いいねの数');
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
        Schema::dropIfExists('articles');
    }
}
