<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', '32');
            $table->string('name', '16');
            $table->char('pass', '32');
            $table->string('userpic', '255');
            $table->string('phone');
            $table->tinyInteger('sex');
            $table->string('email')->unique();
            $table->string('email_code');
            $table->timestamp('addtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
