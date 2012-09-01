<?php

class Create_Teams_Table {

	public function up()
	{
		Schema::create('bossys_teams', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bossys_teams');
	}

}