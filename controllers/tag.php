<?php
require_once(BASE_CONTROLLER);
class tagController extends Controller {
	public function add_tag($tags = null, $image_id = null, $bool = null)
	{
		if (empty($tags))
		{
			$tags = array($_POST['tag']);
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Tag.php');
		$model = new Tag();
		foreach ($tags as $tag)
		{
			$model->add_tag($tag, $image_id);
		}
			$this->get_tags($image_id);
	}
	public function get_tags($image_id = null)
	{
		if (empty($image_id))
		{
			$image_id = $_POST['id'];
		}
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
		else
		{
			echo "{}";
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
			$this->get_tags($image_id);
		}
		}
	}

	public function search_by_tag()
	{
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
					$image_id = $model->get_images($results[0]->id);
					
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
						return_view('view.image_search_results.php', $images);
					}
				}
			else
			{
				$_SESSION['query'] = $query;
				return_view('view.image_search_results.php');
			}
			
		}
		
	
	}
}



?>