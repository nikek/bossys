<?php

class Station extends Eloquent {
	
	public function rounds() {
		return $this->has_many('Round');
	}
	
}