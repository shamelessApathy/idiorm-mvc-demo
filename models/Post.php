<?php

class Post {
	/*
	*
	* Creates new post
	*
	*/
	public static $_table_use_short_name = true;
	public function create_new()
	{
		$time = time();
		$author_id = $_SESSION['user_info']->id;
		$title = $_POST['title'];
		$body = $_POST['body'];
		$tags = $_POST['tags'];
		$newPost = ORM::for_table('post')->create();
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
		$post = ORM::for_table('post')->where('post_id', $id)->find_one();
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
		$post = ORM::for_table('post')->where('post_id', $id)->find_one();
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
		$post = ORM::for_table('post')->where('post_id', $id)->find_one();
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
	*
	* Gets author name from the user id
	*
	*/
	public function author($id)
	{
		$author_name = ORM::for_table('user')->where('id', $id)->find_one();
		$author_name = $author_name->username;
		return $author_name;
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
		$beginPost = $begin;
		$endPost = $end;
		$begin = strtotime($begin);
		$end = strtotime($end);
		$posts = ORM::for_table('post')->where_gte('created_at', $begin)->find_many();
		foreach ($posts as $post)
		{
			$id = $post->author_id;
			$author_name = $this->author($id);
			$post->author_name = $author_name;
		}
		$_SESSION['search_params'] = array('begin'=>$beginPost, 'end' => $endPost);
		return $posts;
	}
	public function search_posts($id = null)
	{	
		if (isset($_POST['parameter']))
		{
		$param = $_POST['parameter'];
		$query = $_POST['query'];
		}
		if (isset($id))
		{
			$param = 'author_id';
			$query = $id;
		}
		$posts = ORM::for_table('post')->where($param, $query)->find_many();
		foreach ($posts as $post)
		{
			$id = $post->author_id;
			$author_name = $this->author($id);
			$post->author_name = $author_name;
		}
		$_SESSION['search_params'] = array('Type' => $param, 'Search Field' => $query);
		return $posts;
	}
}