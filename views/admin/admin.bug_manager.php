<?php
require_once(HEADER);
if (!empty($info))
{
	$bugs = $info;
}
else
{
	$bugs = null;
}
?>


<div class='container'>
<h4>Bug Manager</h4>
<table class='bug-table'>
<col style='width:5%;'>
<col style='width:15%;'>
<col style='width:10%;'>
<col style='width:40%;'>
<col style='width:10%;'>
<col style='width:10%;'>
<thead>
	<th>ID</th>
	<th>EMAIL</th>
	<th>TYPE</th>
	<th>DESCRIPTION</th>
	<th>ANSWERED</th>
	<th>RESOLVED</th>
	<th>CREATED</th>
</thead>
<?php if (!empty($bugs)):?>
	<?php foreach ($bugs as $bug):?>
	<tr >
	<td><?php echo  $bug->id; ?></td>
	<td><?php echo  $bug->email; ?></td>
	<td><?php echo  '  '.$bug->type; ?></td>
	<td><?php echo  $bug->description; ?></td>
	<td><?php echo  $bug->answered; ?></td>
	<td><?php echo  $bug->resolved; ?></td>
	<td><?php echo  date("F j, Y, g:i a", $bug->created_at); ?></td>
	</tr>
	<?php endforeach;?>
<?php endif;?>
</table>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>