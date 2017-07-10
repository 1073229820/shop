<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('ipaddr');
            $table->char('logintime', '64');
            $table->integer('user_id');
            $table->tinyInteger('pass_wrong_time_status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userinfos');
    }
}
