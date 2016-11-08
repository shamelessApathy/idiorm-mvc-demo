<?php

class Post {
	public function create_new()
	{
		$author_id = $_SESSION['user_info']->id;
		$title = $_POST['title'];
		$body = $_POST['body'];
		$newPost = ORM::for_table('posts')->create();
		$newPost->author_id = $author_id;
		$newPost->title = $title;
		$newPost->body = $body;
		if ($newPost->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_post($id)
	{
		$id = $id;
		$post = ORM::for_table('posts')->where('post_id', $id)->find_one();
		return $post;
	}
	public function update_post($id)
	{
		$id = intval($id);
		$title = $_POST['title'];
		$body = $_POST['body'];
		$post = ORM::for_table('posts')->where('post_id', $id)->find_one();
		$post->set('title', $title);
		$post->set('body', $body);
		if($post->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}