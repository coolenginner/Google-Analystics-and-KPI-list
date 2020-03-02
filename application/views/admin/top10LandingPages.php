<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Page Path</th>
			<th>Sessions</th>
			
		</tr>
	</thead>
	<tbody>
		<?php if(isset($res) && count($res)>0){
			foreach($res as $row){?>
		<tr>
			<td><?php echo isset($row[0])?ucfirst($row[0]):'';?></td>
			<td><?php echo isset($row[1])?number_format($row[1],0):'';?></td>
		</tr>
	<?php }}?>
	</tbody>
</table>