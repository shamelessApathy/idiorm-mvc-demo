<?php
require_once(BASE_CONTROLLER);
class tagController extends Controller {
	public function add_tag($tags = null, $image_id = null)
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
		require_once(MODELS . '/Tag.php');
		$model = new Tag();
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
		if (!empty($_GET['query']))
		{
			$query = $_GET['query'];
			//if (str_pos($query, " ") !== false)
			//{
				//$query = explode(" " ,$query);
			//}
			require_once(MODELS . '/Tag.php');
			$model = new Tag();
			$results = $model->search_by_tag($query);
			// if we find related tags to the query, search for images in tag_to_image table that are linked with each tag_id
			if($results)
			{
				$image_ids = array();
				foreach ($results as $tag)
				{
					var_dump($tag->id);
					$image_id = $model->get_images($tag->id);
					if ($image_id)
					{
						foreach ($image_id as $image)
						{
							array_push($image_ids, $image->image_id);
						}
					}
				}
				if (empty($image_ids))
				{
					return_view('view.home.php');
					user_msg('Sorry, no images matched your query!');
				}
				$image_array = array();
				require_once(MODELS . '/Image.php');
				foreach ($image_ids as $image_id)
				{
					$image_model = Model::factory('Image')->find_one($image_id);
					if ($image_model->auth == '1')
					{
						array_push($image_array, $image_model);
					}
				}
				return_view('view.image_search_results.php', $image_array);
			}
			else
			{
				echo 'something happened';
			}
		}
	}
}

?>