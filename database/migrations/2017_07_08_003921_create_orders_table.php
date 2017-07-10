<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->string('cnee_name');
            $table->string('cnee_tel');
            $table->string('cnee_address');
            $table->string('cnee_province');
            $table->string('cnee_city');
            $table->string('cnee_area');
            $table->string('code');
            $table->string('order_number');
            $table->integer('ordertime');
            $table->integer('paytime');
            $table->integer('total_price');
            $table->tinyInteger('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
