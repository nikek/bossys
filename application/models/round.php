<?php

class Round extends Eloquent {
	
	public $includes = array('team', 'station');
	
	public function team()
	{
		return $this->belongs_to('Team');
	}
	
	public function station()
	{
		return $this->belongs_to('Station');
	}
}