<?php 
$file = $_FILES['canvas-file'];
$type = $file['type'];
$tmp_name = $file['tmp_name'];
$type = $file['type'];
$ext = explode('/',$type); 
$ext = $ext[1];
//var_dump($ext);

$post_info = $_POST;
$user_image_name = $_POST['user_image_name'];
$category_id = $_POST['category-id'];
$tags = $_POST['tags'];

echo "currently inside tools.special_upload.php";


// runs through list of everything that needs to be done and recorded to create an instance of an image


?> 