<?php
require_once(BASE_CONTROLLER);
class postController extends Controller {
	/*
	* Calls view to create a post
	*/
	public function new_post(){
		return_view('view.create_post.php');
	}
	/*
	* Get's a single post by it's ID from the model and returns it in the view for single post
	*/
	public function show_post($id)
	{
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$post = $model->get_post($id);
		return_view('view.post.php' , $post);
	}
	/*
	* calls function to create_new() post from the model, then reroutes to home when complete
	*/
	public function create_new()
	{
		$title = $_POST['title'];
		$body = $_POST['body'];
		$tags = $_POST['tags'];
		$author_id = $_SESSION['user_info']->id;
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$result = $model->create_new($title, $body, $tags, $author_id);
		if ($result){
			header('Location:/home');
			user_msg('Post created successfully'); // <-- this doesn't work, why?
		}
		else
		{
			echo 'something went wrong';
		}
	}
	/*
	* Calls view to edit post
	*/
	public function edit_post($id)
	{
		require(MODELS . '/Post.php');
		$model = new Post();
		$post = $model->get_post($id);
		return_view('view.edit_post.php', $post);
	}
	/*
	* Calls update_post function from model, then calls the show_post function to render in view
	*/
	public function update_post($id)
	{
		$id = $id;
		$title = $_POST['title'];
		$body = $_POST['body'];
		$tags = $_POST['tags'];
		require_once(MODELS . '/Post.php');
		$model = new Post();
		if ($model->update_post($title, $body, $tags, $id))
		{
			$this->show_post($id);
		}
		else
		{
			echo 'something happeneds';
		}

	}
	/*
	* Routes to a yes or no page to confirm the deletion of a post
	*/
	public function confirm_delete($id)
	{
		return_view('view.confirm_delete.php', $id);
	}
	/*
	* calls delete function
	*/
	public function delete($post_id)
	{
		require_once(MODELS . '/Post.php');
		$post_id = intval($post_id);
		$post = Model::factory('Post')->find_one($post_id);
		var_dump($post);
		$log = ORM::get_last_query();
		var_dump($log);
		$post->delete();
	}

	public function search_by_date()
	{
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$posts = $model->search_by_date();
		return_view('view.posts.php', $posts);
	}
	public function search_posts($id = null)
	{
		if (isset($_POST['parameter']))
		{
		$param = $_POST['parameter'];
		$query = $_POST['query'];
		}
		if (!empty($id))
		{
			$param = 'author_id';
			$query = $id;
		}
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$posts = $model->search_posts($id, $param, $query);
		foreach ($posts as $post)
		{
			$id = $post->author_id;
			$author_name = $model->author($id);
			$post->author_name = $author_name;
		}
		return_view('view.posts.php', $posts);
	}
	public function test($user_id)
	{
		require_once(MODELS . "/User.php");
		require_once(MODELS . '/Post.php');
		$user = Model::factory('User')->find_one($user_id);
		$posts =$user->posts()->find_many();
		var_dump($posts);

	}

}