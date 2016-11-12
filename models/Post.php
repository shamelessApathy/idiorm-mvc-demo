<?php

class Post {
	/*
	*
	* Creates new post
	*
	*/
	public function create_new()
	{
		$time = time();
		$author_id = $_SESSION['user_info']->id;
		$title = $_POST['title'];
		$body = $_POST['body'];
		$tags = $_POST['tags'];
		$newPost = ORM::for_table('posts')->create();
		$newPost->author_id = $author_id;
		$newPost->title = $title;
		$newPost->body = $body;
		$newPost->tags = $tags;
		$newPost->created_at = $time;
		if ($newPost->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	*
	* Get's a post by it's ID
	*
	*/
	public function get_post($id)
	{
		$id = $id;
		$post = ORM::for_table('posts')->where('post_id', $id)->find_one();
		return $post;
	}
	/*
	*
	* Get's a post by it's id, and then updates it
	*
	*/
	public function update_post($id)
	{
		$id = intval($id);
		$time = time();
		$title = $_POST['title'];
		$body = $_POST['body'];
		$post = ORM::for_table('posts')->where('post_id', $id)->find_one();
		$post->set('title', $title);
		$post->set('body', $body);
		$post->set('updated_at', $time );
		if($post->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	*
	* Deletes post
	*
	*/
	public function delete($id)
	{
		$post = ORM::for_table('posts')->where('post_id', $id)->find_one();
		if($post->delete())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	*
	* Searches by date, converts dd/mm/yyyy to unix time stamp
	*
	*/
	public function search_by_date()
	{
		$begin = $_POST['begin_range'];
		$end = $_POST['end_range'];
		$begin = strtotime($begin);
		$end = strtotime($end);
		$posts = ORM::for_table('posts')->where_gte('created_at', $begin)->find_many();
		return $posts;
	}
}