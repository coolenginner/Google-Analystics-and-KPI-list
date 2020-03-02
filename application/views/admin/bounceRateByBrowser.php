<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Browser</th>
			<th>Bounce Rate (%)</th>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($res) && count($res)>0){
			foreach($res as $row){?>
		<tr>
			<td><?php echo isset($row[0])?$row[0]:'';?></td>
			<td><?php echo isset($row[1])?number_format($row[1],2):'';?></td>
		</tr>
	<?php }}?>
	</tbody>
</table>