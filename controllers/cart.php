<?php

require_once(BASE_CONTROLLER);

class cartController extends Controller {

	public function __construct()
	{
		$this->items = array();
		if (isset($_SESSION['cart']))
		{
		$this->items = $_SESSION['cart'];
		}
	}
	public function display_cart()
	{
		echo 'this is it';
		require_once(MODELS . '/Image.php');
		$info = array();
		$model = new Image();
		foreach ($this->items as $item)
		{
			$image = $model->get_info($item);
			array_push($info, $image);
		}
		return_view('store/store.cart.php', $info);
	}
	public function add_item($item = null)
	{
		$item = $_POST['image_id'];
		$toPush = array('image_id' => $item);
		array_push($this->items, $toPush);
		$this->save();

	}
	private function save()
	{
		$_SESSION['cart'] = $this->items;
	}
}