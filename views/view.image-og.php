<?php 
$image = $info['image'];
$image_url = "http://www.sharefuly.com" . $image->thumbnail;
$path = "/image/info?id=";
$request =$_SERVER['REQUEST_URI'];
$exploded = explode('/',$request);
$second_explode = explode('?',$exploded[2]);
$which = $second_explode[0];
if (isset($image->id))
{
  $page_url = "http://www.sharefuly.com/image/info?id=".$image->id;
}
else
{
  $page_url = "http://www.sharefuly.com";
}
$description = "";
if (isset($info['tags']))
{
  foreach ($info['tags'] as $tag)
  {
    $description = $description.$tag['text'].", ";
  }
}

   ?>
  
<meta property="og:title" content="<?php echo $image->user_image_name;?>" />
<meta property="og:type" content="website"/>  
<meta property="og:image" content="<?php echo $image_url;?>"/>
<meta property="og:url"   content="<?php echo $page_url;?>"/>
<meta property="og:description" content="<?php echo $description;?>"/>
<meta property="og:site_name"   content="Sharefuly"/>
