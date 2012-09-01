<?php

class Create_Bossys_Rounds_Table {

	public function up()
	{
		Schema::create('bossys_rounds', function($table) {
			$table->increments('id');
			$table->integer('team_id');
			$table->integer('station_id');
			$table->integer('score');
			$table->integer('extra');
			$table->text('description');
			$table->timestamp('arrived_at');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bossys_rounds');
	}

}