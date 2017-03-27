<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

		$table->increments('id');
		$table->string('username',100)->unique();
		$table->string('email')->unique();
		$table->string('password',100);
		$table->integer('priviliges');
		$table->rememberToken();
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
		Schema::drop('users');
	}

}
