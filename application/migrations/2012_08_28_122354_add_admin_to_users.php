<?php

class Add_Admin_To_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Add admin to users table
		User::create(array(
			'username' => 'vraque',
			'password' => Hash::make('ettsnelhest')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}