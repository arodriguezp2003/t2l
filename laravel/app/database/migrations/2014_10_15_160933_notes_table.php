<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('notes',function($t){
			$t->increments("id");
			$t->integer('user_id');
			$t->integer('categoria_id');
			$t->string('titulo');
			$t->string('cuerpo');
			$t->integer('order');
			$t->string('color');
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
		//
		Schema::drop('notes');
	}

}
