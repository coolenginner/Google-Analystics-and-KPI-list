<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Gender</th>
			<th>Page Title</th>
			<th>Page Path</th>
			<th>Hits</th>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($res) && count($res)>0){
			foreach($res as $row){?>
		<tr>
			<td><?php echo isset($row[0])?ucfirst($row[0]):'';?></td>
			<td><?php echo isset($row[1])?$row[1]:'';?></td>
			<td><?php echo isset($row[2])?$row[2]:'';?></td>
			<td><?php echo isset($row[3])?number_format($row[3],0):'';?></td>
		</tr>
	<?php }}?>
	</tbody>
</table>