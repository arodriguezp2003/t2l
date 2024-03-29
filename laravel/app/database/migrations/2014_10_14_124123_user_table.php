<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($t){
			$t->increments('id');
			$t->string('username');
			$t->string('email');
			$t->string('password');
			$t->string('real_name');
			$t->string('avatar');
			$t->integer('activo');
			$t->integer('admin');
			$t->timestamps();
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
