<?php require_once(HEADER);?>

<div class='container'>
<h4>Category Manager</h4>
	<div class='row'>
	<a href="/admin/show_unapproved"><button type='button'>Get Unnapproved Categories</button></a>
	<table>
	<col style='width:50px'>
	<col style='width:50px'>
	<col style='width:150px; text-align:center;'>
	<thead>
	<th>Id</th>
	<th>Name</th>
	<th>Approved</th>
	</thead>
	<tbody>

	<?php if (isset($info['approved'])):?>
		<?php foreach ($info['approved'] as $category): ?>
		<tr>
			<td><?php echo $category->id;?></td>
			<td><?php echo $category->title;?></td>
			<td style='text-align:center;'><?php echo $category->approved;?></td>
		</tr>
		<?php endforeach;?>
<?php endif;?>
	<?php if (isset($info['unapproved'])):?>
		<?php foreach ($info['unapproved'] as $category): ?>
		<tr>
			<td><?php echo $category->id;?></td>
			<td><?php echo $category->title;?></td>
			<td style='text-align:center;'>No  <button class='approve' data-id="<?php echo $category->id;?>">Approve</button></td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>
	</tbody>
	</table>
	</div>
</div>
<?php 
require_once(HTML_FOOTER);
require_once(FOOTER);
?>
<script src='/views/admin/js/admin_category_manager.js'></script>