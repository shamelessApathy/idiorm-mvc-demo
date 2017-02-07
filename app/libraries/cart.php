<?php

class Cart {
	public function __construct()
	{
		$this->items = array();
		if (isset($_SESSION['cart']))
		{
		$this->items = $_SESSION['cart'];
		}
	}
	public function count_items()
	{
		if (isset($_SESSION['cart']))
		{
			$items = $_SESSION['cart'];
			return count($items);
		}
	}
	public function add_item($item = null)
	{
		$item = $_POST['image_id'];
		$toPush = array('image_id' => $item);
		array_push($this->items, $toPush);
		$_SESSION['cart'] =  $this->items;
		//$this->save();
	}
	public function remove_item($item = null)
	{
		$test = array_search($this->$items, $item);
	}
	private function save()
	{
		$_SESSION['cart'] = $this->items;
	}
}

?>