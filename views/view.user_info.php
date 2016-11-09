
<?php require_once(HEADER);?>





<body>
<h1> USER INFO: </h1>	
<table>
	<tr>
		<td>Name:</td>
		<td><?php echo $info['name'];?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?php echo $info['email'];?></td>
	</tr>
	<tr>
		<td>ID Number:</td>
		<td><?php echo $info['id'];?></td>
	</tr>
</table>


</body>

<?php require_once(FOOTER); ?>