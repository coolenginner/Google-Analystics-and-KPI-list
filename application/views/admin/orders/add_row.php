<div class="row row-block">
	<div class="col-md-5">
		<div class="row">
			<div class="col-md-1">
				<label class="m-t-sm row-number">0</label>
			</div>
			<div class="col-md-3">
				<input type="hidden" name="merchant_id[<?php echo $counter;?>]" class="merchant_name_<?php echo $counter;?>99" value="0">
				<div class="form-group">

					<input type="text" required="required" name="merchant_name[<?php echo $counter;?>]" value="" class="merchant_name form-control merchant_name_<?php echo $counter;?>" placeholder="Merchant Name">

				</div>
			</div>
			<div class="col-md-4">
				<input type="hidden" name="product_id[<?php echo $counter;?>]" class="product_name_<?php echo $counter;?>99" value="0">
				<div class="form-group">
					<input type="text" required="required" name="product_name[<?php echo $counter;?>]" value="" class="form-control product_name_<?php echo $counter;?>" placeholder="Product Name">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" required="required" name="link[<?php echo $counter;?>]" value="" class="form-control link" placeholder="Product Link">
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<input type="text"  name="color[<?php echo $counter;?>]" value="" class="form-control color" placeholder="Color">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<input type="text"  name="size[<?php echo $counter;?>]" value="" class="form-control size" placeholder="Size">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" required="required" number="true" name="per_unit[<?php echo $counter;?>]" value="" class="form-control per_unit" placeholder="Per/Unit Sale Price">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<input type="text" required="required" digits="true" name="quantity[<?php echo $counter;?>]" value="" class="form-control quantity" placeholder="Quantity">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" number="true" required="required" name="sale_price[<?php echo $counter;?>]" value="" class="form-control sale_price" placeholder="Sale Price">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" number="true" required="required" name="dollar_price[<?php echo $counter;?>]" value="" class="form-control dollar_price" placeholder="Dollar Price">
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="form-group">
					<button type="button" class="btn btn-danger btn-sm delete_row">Delete</button>
				</div>
			</div>
		</div>
	</div>
</div>