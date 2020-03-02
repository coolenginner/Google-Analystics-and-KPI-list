<?php 
$total_sale_price = isset($row->total_sale_price)?$row->total_sale_price:0;
$advance = isset($row->advance)?$row->advance:0;
		$remaining = $total_sale_price-$advance;
		?>
<div class="row">
	<div class="col-md-3">
		<h6 class="b-b">Invoice Amount</h6>
		<p class="text-md">Rs: <?php echo isset($total_sale_price)?number_format((double)$total_sale_price,0):0;?></p>		
	</div>
	<div class="col-md-3">
		<h6 class="b-b">Advance Amount</h6>
		<p class="text-md">Rs: <?php echo isset($advance)?number_format((double)$advance,0):0;?></p>		
	</div>
	<div class="col-md-3">
		<h6 class="b-b">Remaining Amount</h6>

		<p class="text-md">Rs: <?php echo isset($remaining)?number_format((double)$remaining,0):0;?></p>		
	</div>
</div>