<?php

class Create_Stations_Table {

	public function up()
	{
		Schema::create('bossys_stations', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('unit');
			$table->float('ratio');
			$table->string('slug');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bossys_stations');
	}

}