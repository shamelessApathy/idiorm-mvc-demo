<?php
class postController {
	public function new_post(){
		return_view('view.create_post.php');
	}
	public function show_post($id)
	{
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$post = $model->get_post($id);
		return_view('view.post.php' , $post);
	}
	public function create_new()
	{
		require_once(MODELS . '/Post.php');
		$model = new Post();
		$result = $model->create_new();
		if ($result){
			header('Location:/home');
			user_msg('Post created successfully');
		}
	}
	public function edit_post($id)
	{
		require(MODELS . '/Post.php');
		$model = new Post();
		$post = $model->get_post($id);
		return_view('view.edit_post.php', $post);
	}
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
}