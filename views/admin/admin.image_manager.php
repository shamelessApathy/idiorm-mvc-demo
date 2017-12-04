<?php
require(HEADER);

?>
<div class='container'>
<h3>Image Admin</h3>
<a href='/report/get_reports/unresolved'><button>Get Reported Images</button></a>

<?php if (isset($info['reports'])):?>
	<table class='image_reports'>
	<col style='width:15%;'>
	<col style='width:10%;'>
	<col style='width:10%;'>
	<col style='width:10%;'>
	<col style='width:15%;'>
	<col style='width:15%;'>
	<col style='width:10%;'>
	<col style='width:15%;'>
	<thead>
	<th>IMG </th>
	<th>Image ID </th>
	<th>Type </th>
	<th>User Submit </th>
	<th>Description </th>
	<th>Resolved </th>
	<th>Created</th>
	<th>Controls</th>
	</thead>
	<?php foreach ($info['reports'] as $report):?>
		<tr>
			<td><a href="/image/info?id=<?php echo $report->image_id;?>"><img style='max-width:50px;' src="<?php echo $report->image_url;?>"/></a></td>
			<td><?php echo $report->image_id;?></td>
			<td><?php echo $report->type;?></td>
			<td><?php echo $report->user_id;?></td>
			<td><?php echo $report->description;?></td>
			<td><?php echo $report->resolved;?></td>
			<td><?php $date = date('m-d-Y', $report->created_at); echo $date;?></td>
			<td><a href="/image/unauthorize/<?php echo $report->id;?>">Unauthorize</a></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<?php
require_once(HTML_FOOTER);
require(FOOTER);
?>