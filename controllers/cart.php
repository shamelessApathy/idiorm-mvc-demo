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
		require_once(MODELS . '/Image.php');
		$info = array();
		$model = new Image();
		foreach ($this->items as $item)
		{
			$image = $model->get_info($item['image_id']);
			array_push($info, $image);
		}
		return_view('store/store.cart.php', $info);
	}
	public function remove_item()
	{
		$image_id = (int) $_POST['image_id'];
		foreach ($this->items as $item)
		{
			if ($item['image_id'] == $image_id)
			{
				$test = array_search($item, $this->items);
				array_splice($this->items, $test, 1);
				//unset($item);
				//var_dump($this->items);
			}

		}
		var_dump($this->items);
		$this->save();

	}
	public function send_info()
	{
		require_once(MODELS . '/Image.php');
		$items = $_SESSION['cart'];
		$price =0;
		foreach ($items as $item)
		{
			$model = Model::factory('Image')->find_one($item['image_id']);
			$price += $model->price;

		}
		if ($price < 10)
		{
			$price = $price + .30;
		}
		$price = $price *100;

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_u05I8eb3Re5YPyHaTeJpgSZx");

		// Token is created using Stripe.js or Checkout!
		// Get the payment token submitted by the form:
		$token = $_POST['stripeToken'];

		// Charge the user's card:
		$charge = \Stripe\Charge::create(array(
		  "currency" => "usd",
		  "description" => "Example charge",
		  "source" => $token,
		  'amount' => $price
		));
		if ($charge)
		{
			require_once(MODELS . '/Image.php');
			$image_model = new Image();
			foreach ($items as $item)
			{
				$image_model->purchase($item['image_id'], $_SESSION['user_info']['id']);
			}
			$_SESSION['cart'] = null;
			return_view('store/store.image_success.php');
		}
		
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
		$path = ROOT . "/app/errors.log";
		file_put_contents( $path, 'it saved');
		$_SESSION['cart'] = $this->items;
	}
}