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
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$result = $model->create_new();
		if ($result){
			header('Location:/home');
			user_msg('Post created successfully'); // <-- this doesn't work, why?
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
		require_once(MODELS . '/Post.php');
		$model = new Post();
		if ($model->update_post($id))
		{
			$this->show_post($id);
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
	public function delete($id)
	{
		require_once(MODELS . '/Post.php');
		$model = new Post();
		if ($model->delete($id))
		{
			return_view('view.home.php');
			user_msg('Post successfully deleted');

		}
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
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$posts = $model->search_posts($id);
		return_view('view.posts.php', $posts);
	}
}