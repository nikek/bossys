<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create table bossys_users
		Schema::create('bossys_users', function($t) {
			
			$t->increments('id');
			$t->string('username', 32);
			$t->string('password', 64);
			$t->timestamps();
			
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// Delete table bossys_users
		Schema::drop('bossys_users');
	}

}