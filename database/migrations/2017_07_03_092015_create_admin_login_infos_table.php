<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLoginInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_login_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->ipAddress('ipaddr')->comment('登录ip');
            $table->dateTime('logintime')->comment('登录时间');
            $table->tinyInteger('pass_wrong_time_status')->comment('登录密码错误状态 0:正常 2:错误');
            $table->engine = 'InnoDB';
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
        Schema::drop('admin_login_infos');
    }
}
