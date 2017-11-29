<?php
require_once(BASE_CONTROLLER);
class toolsController extends Controller{

	public function test()
	{
		return_view('tools/tools.test.php');
	}
	public function main()
	{
		return_view('tools/tools.main.php');
	}
	public function exif()
	{
		return_view('tools/tools.exif_reader.php');
	}
	public function get_exif()
	{
		var_dump($_FILES['image']);
		$tmp_name = $_FILES['image']['tmp_name'];
		$name = $_FILES['image']['name'];
		$explode = explode('.', $name);
		$test_ext = $explode[1];

		if ($test_ext === "jpg" || $test_ext === 'jpeg')
		{
			# From here we need to capture exif data of uploaded image
			$exec = exif_read_data($tmp_name);
			if ($exec)
			{
				// This is done via upload $_FILE stream
				return_view('tools/tools.exif_results.php', $exec);
			}
			else
			{
				echo "there was an error during the exec() process";
			}
		}
		else
		{
			return_view('tools/tools.test.php');
			sys_msg('Filetype needs to be jpeg or jpg!!!');
		}
	}
	public function image_editor()
	{
		return_view('tools/tools.image_editor.php');
	}

}
?> 