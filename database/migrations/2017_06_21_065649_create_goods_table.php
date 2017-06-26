<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('cat_id');
            $table->integer('type_id');
            $table->string('goods_name');
            $table->text('descr');
            $table->double('price', 6, 2);
            $table->string('logo');
            $table->tinyInteger('status');
            $table->integer('store');
            $table->integer('num');
            $table->integer('clicknum');
            $table->integer('addtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
