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
	public function remove_tag()
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

?>