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
            $table->string('production')->comment('生产厂家');
            $table->integer('type_id')->comment('种类id');
            $table->string('name')->comment('商品名');
            $table->text('descr')->comment('简单的描述');
            // $table->double('price', 6, 2);
            $table->string('image')->comment('图片或主图');
            $table->tinyInteger('status')->comment('状态，1=>新添加，2=>在售,3=>下架');
            $table->integer('store')->comment('总存量');
            $table->integer('num')->default(0)->comment('被购买的次数');
            $table->integer('clicknum')->default(0)->comment('点击量');
            $table->integer('hot')->default(0)->comment('热卖，0为否，1为热卖');
            $table->integer('recommend')->default(0)->comment('0为不推荐，1为推荐');
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
        Schema::drop('goods');
    }
}
