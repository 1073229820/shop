<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attr1')->comment('影响价格的属性1');
            $table->string('attr2')->comment('影响价格的属性2');
            $table->double('price', 6, 2)->comment('商品价格');
            $table->integer('store')->comment('库存');
            $table->integer('goods_id')->comment('商品的id');
            $table->string('image')->comment('商品图片');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prices');
    }
}
