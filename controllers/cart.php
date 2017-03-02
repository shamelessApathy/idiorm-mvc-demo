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
	/*
	*
	* Creates a customer with stripe for the current user, gets return results
	*
	*/
	private function create_stripe_customer($stripe_token)
	{
		$user_id = $_SESSION['user_info']['id'];
		$email = $_SESSION['user_info']['email'];
		\Stripe\Stripe::setApiKey("sk_test_u05I8eb3Re5YPyHaTeJpgSZx");
		// Make request
		$response = \Stripe\Customer::create(array(
		  "description" => "sharefuly cust_id = $user_id",
		  "source" => "$stripe_token", // obtained with Stripe.js
		  "email" => "$email"
		));
		// Set Stripe ID
		$stripe_customer_id = $response['id'];
		require_once(MODELS . '/User.php');
		// Instantiate User Model
		$cust_model = Model::factory('User')->find_one($user_id);
		$cust_model->stripe_id = $stripe_customer_id;
		if ($cust_model->save())
		{
			return true;
		}
	}
	/*
	*
	* Adds subscription to database once create_stripe_subscription returns true
	*
	*/
	public function add_subscription($period_start, $period_end, $stripe_sub_id)
	{
		$plan_id = $_SESSION['plan_id'];
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/User.php');
		$user_model = new User();
		if($user_model->add_subscription($user_id, $plan_id, $period_start, $period_end, $stripe_sub_id))
		{
			user_msg('Subscription Added Successfully!');
		}
	}
	/*
	*
	* After Stripe token is created, begins process of creating and adding subscription
	*
	*/
	public function process_subscription()
	{
		$stripe_token = $_POST['stripeToken'];
		$plan = strtolower($_SESSION['plan']);
		require_once(MODELS . '/User.php');
		$user = Model::factory('User')->find_one($_SESSION['user_info']['id']);
		if ($user->stripe_id === NULL)
		{
			$this->create_stripe_customer($stripe_token);
		}
		$user = Model::factory('User')->find_one($_SESSION['user_info']['id']);
		$this->create_stripe_subscription($stripe_token, $user->stripe_id, $plan);
		$count = $user->subscription_count();
		$_SESSION['sub_count'] = $count;
	}
	/*
	*
	* Creates a subscription for the current user with stripe's API
	*
	*/
	private function create_stripe_subscription($stripe_token, $stripe_id, $plan)
	{
		\Stripe\Stripe::setApiKey("sk_test_u05I8eb3Re5YPyHaTeJpgSZx");

		$response = \Stripe\Subscription::create(array(
		  "customer" => "$stripe_id",
		  "plan" => "$plan"
			));
			if($response)
			{	
				$period_start = $response['current_period_start'];
				$period_end = $response['current_period_end'];
				$stripe_sub_id = $response['id'];
				$this->add_subscription($period_start, $period_end, $stripe_sub_id);
			}
	}
	/*
	*
	* Brings up subscription view
	*/
	public function create_subscription()
	{
		return_view('store/store.subscription.php');
	}
	private function create_customer()
	{

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