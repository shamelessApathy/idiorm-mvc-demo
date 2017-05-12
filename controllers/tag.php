<?php
require_once(BASE_CONTROLLER);
class tagController extends Controller {
	public function add_tag($tags = null, $image_id = null, $bool = null)
	{
		if (empty($tags))
		{
			$tag = $_POST['tag'];
			$image_id = $_POST['image_id'];
			require_once(MODELS . '/Tag.php');
			$model = new Tag();
			$model->add_tag($tag, $image_id);
			$other = true;
			$this->get_tags($image_id,$other);
		}
		else
		{
			require_once(MODELS . '/Tag.php');
			$model = new Tag();
			foreach ($tags as $tag)
			{
				$model->add_tag($tag, $image_id);
			}
				$this->get_tags($image_id);
		}
	}
	public function get_tags($image_id = null, $other = null)
	{
		if (!empty($other) && $other === true) 
		{		
			require_once(MODELS . '/Image.php');
			$model = Model::factory('Image')->find_one($image_id);
			$tags = $model->get_tags($image_id);
			if ($tags)
			{	
			$tags_array = array();
				foreach($tags as $tag)
				{
					$id = $tag->tag_id;
					$table = ORM::for_table('tag')->where('id', $id)->find_one();
					array_push($tags_array, array('text' =>$table->text, 'id'=>$table->id));
				}
			$tags = json_encode($tags_array);
			echo $tags;
			}
		}
		else
		{
			require_once(MODELS . '/Image.php');
			$model = Model::factory('Image')->find_one($image_id);
			$tags = $model->get_tags($image_id);
			if ($tags)
			{	
			$tags_array = array();
				foreach($tags as $tag)
				{
					$id = $tag->tag_id;
					$table = ORM::for_table('tag')->where('id', $id)->find_one();
					array_push($tags_array, array('text' =>$table->text, 'id'=>$table->id));
				}
			$tags = $tags_array;
			return $tags;
			}
		}

	}
	public function remove_tag($tag_id = null, $image_id = null)
	{
		if (empty($tag_id))
		{ 
			$image_id = $_POST['image_id'];
			$tag_id = $_POST['tag_id'];
			require_once(MODELS . '/Tag.php');
			$model = new Tag();
			$result = $model->remove_tag($image_id, $tag_id);
			if ($result)
			{
				$other = true;
				$this->get_tags($image_id, $other);
			}
		}
	}

	public function search_by_tag()
	{
		if (!empty($_GET['page']))
		{
			$page = $_GET['page'];
		}
		else
		{
			$page = 1;
		}
		$page2 = $page -1;
		$limit = 20;
		$offset = $page2*$limit;
		require_once(MODELS . '/Vote.php');
		$vote_model = new Vote();
		
		if (!empty($_GET['query']))
		{
			$query = $_GET['query'];
			//if (str_pos($query, " ") !== false)
			//{ 
				//$query = explode(" " ,$query);
			//}
			require_once(MODELS . '/Tag.php');
			require_once(MODELS . '/Image.php');
			$model = new Tag();
			$results = $model->search_by_tag($query);
			
			// if we find related tags to the query, search for images in image_to_tag table that are linked with each tag_id
			if(!empty($results))
			{
				$images = array();
				$count = $model->get_count($results[0]->id);
					$image_id = $model->get_images($results[0]->id, $limit, $offset);
					
					if (isset($image_id))
					{
						foreach ($image_id as $image)
						{
							if (empty($image->vote))
							{
								$image->vote = 0;
								$image_factory = Model::factory('Image')->find_one($image->image_id);
								$image->thumbnail = $image_factory->thumbnail;
							}
							$get_votes = $vote_model->weighted_vote($image->image_id, $results[0]->id);
							$image->vote = (Int) $get_votes;
							$image->tags =  $this->get_tags($image['image_id']);
							$image_model = Model::factory('Image')->find_one($image['image_id']);
							$image->info = $image_model;
							array_push($images, $image);
						}
						function cmp($a, $b)
						{
							if ($a->vote === $b->vote)
							{
								return 0;
							}
							return ($a->vote > $b->vote) ? -1:1;
						}
						uasort($images, 'cmp');
						$array = array('images'=>$images, 'query' => $query, 'count'=>$count, 'page'=>$page, 'limit'=>$limit);
						return_view('view.image_search_results.php', $array);
					}
				}
			else
			{
				
				return_view('view.image_search_results.php', array('query'=>$query));
			}
			
		}
		
	
	}
}



?>