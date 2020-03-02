
<div class="panel-body">
	<div class="row">
		<div class="col-md-2">
			<h6 class="b-b">Name</h6>
			<p class="text-sm"><?php echo isset($row->name)?$row->name:'';?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Email</h6>
			<p class="text-sm"><?php echo isset($row->email)?$row->email:'';?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Mobile</h6>
			<p class="text-sm"><?php echo (isset($row->mobile) && $row->mobile!='')?$row->mobile:'-';?></p>		
		</div>

		<div class="col-md-2">
			<h6 class="b-b">Phone</h6>
			<p class="text-sm"><?php echo isset($row->phone)?$row->phone:'';?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">City</h6>
			<p class="text-sm"><?php echo isset($row->city)?$row->city:'';?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Shipping Address</h6>
			<p class="text-sm"><?php echo isset($row->address)?$row->address:'';?></p>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<h6 class="b-b">Credit Balance</h6>
			<p class="text-sm"><?php echo isset($row->balance)?'Rs: '.$row->balance:0;?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Total Order(s)</h6>
			<p class="text-sm"><?php echo isset($row->total)?$row->total:0;?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Pending Order(s)</h6>
			<p class="text-sm"><?php echo isset($row->total_pending)?$row->total_pending:0;?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Shipped Order(s)</h6>
			<p class="text-sm"><?php echo isset($row->total_shipped)?$row->total_shipped:0;?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">City</h6>
			<p class="text-sm"><?php echo isset($row->city)?$row->city:'';?></p>		
		</div>
		<div class="col-md-2">
			<h6 class="b-b">Phone</h6>
			<p class="text-sm"><?php echo isset($row->phone)?$row->phone:'';?></p>		
		</div>
	</div>
</div>

