<?php

class Store {
	public function user()
	{
		return $this->belongs_to('User');
	}
}

?>