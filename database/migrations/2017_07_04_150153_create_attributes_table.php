<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attr_name')->comment('属性名');
            $table->string('attr_value')->comment('属性可选值');
            $table->integer('type_id')->comment('属性对应的第二级类决定');
            $table->string('attr_price')->comment('属性对应price表的attr1和attr2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attributes');
    }
}
