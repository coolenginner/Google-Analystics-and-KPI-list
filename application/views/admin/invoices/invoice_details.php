<?php 
$order_id = isset($id)?$id:0;
$query="SELECT O.is_payment,O.customer_id,O.advance,P.*,D.*, M.name as merchant FROM cs_order_details D
left join cs_orders O on O.id = D.order_id
left join cs_products P on P.id = D.product_id
left join cs_merchants M on M.id = P.merchant_id
where O.id=? order by D.detail_id asc
";
$query=$this->db->query($query,[$id]);
$results = $query->result();
$customer_id = isset($results[0]->customer_id)?$results[0]->customer_id:0;
$is_payment = isset($results[0]->is_payment)?$results[0]->is_payment:0;
$query="SELECT sum(credit) as other_payments FROM cs_payments where order_id = ? and customer_id=? and credit>0";
$query=$this->db->query($query,[$order_id,$customer_id]);
$payment = $query->row();
$other_payments = isset($payment->other_payments)?$payment->other_payments:0;
$remaining_balance=0;

?>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover table-lg">
				<thead>
					<tr>
						<th>No.</th>
						<th>Merchant</th>
						<th>Product Name</th>
						<th >Size</th>
						<th >Color</th>
						<th>Per Unit Price</th>
						<th class="col-sm-1">Quantity</th>
						<th class="col-sm-1 text-right">Row Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$lp=1; 
					$total=0;
					$total_res = count($results);
					if($total_res>0){
						foreach($results as $key=>$row){
							$quantity =  isset($row->quantity)?$row->quantity:0;;
							$sale_price =  isset($row->sale_price)?$row->sale_price:0;;
							$row_total = $sale_price*$quantity;
							$extra_class='';
							if($total_res==($key+1)){
								$extra_class='b-b';
							}
							?>

							<tr class="<?php echo $extra_class;?>">
								<td><?php echo $lp;?></td>
								<td><?php echo isset($row->merchant)?$row->merchant:'';?></td>
								<td><?php echo isset($row->product_name)?$row->product_name:'';?></td>
								<td><?php echo (isset($row->size) && $row->size!='')?$row->size:'N/A';?></td>
								<td><?php echo (isset($row->color) && $row->color!='')?$row->color:'N/A';?></td>
								<td><?php echo isset($sale_price)?number_format($sale_price):0;?></td>
								<td><?php echo isset($quantity)?$quantity:0;?></td>
								<td class="text-right"><?php echo isset($row_total)?number_format($row_total,0):0;?></td>

							</tr>
							<?php 
							$total = $total+$row_total;
							$lp++;	}
							$advance=isset($row->advance)?$row->advance:0;
							$remaining_balance = $total-$advance-$other_payments;
							?>

							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="row">
					<div class="col-lg-8 col-md-7 hidden-sm hidden-xs">

					</div>
					<div class="col-lg-4 col-md-5">
						<div class="table-responsive no-border">
							<table class="table table-hover">
								<tr class="">
									<th colspan="">Total</th>
									<th class="text-right"><?php echo isset($total)?number_format($total):0;?></th>
								</tr>
								<tr class="">
									<td colspan="">Advance Amount</td>
									<td class="text-right"><?php echo isset($advance)?number_format($advance):0;?></td>
								</tr>
								<tr class="">
									<td colspan="">Other Payments</td>
									<td class="text-right">
										<?php 
										if(isset($other_payments) && $other_payments>0){ ?>
											<a href="javascript:;" id="show_ledger" data-id="<?php echo $order_id;?>" >
												<?php echo isset($other_payments)?number_format($other_payments):0;?>
											</a>
											<?php }else{ echo 0;}?>
										</td>
									</tr>
									<tr class="">
										<th colspan="">Remaining Balance</th>
										<th class="text-right"><?php 
										echo isset($remaining_balance)?number_format($remaining_balance):0;?></th>
									</tr>
									<?php if($remaining_balance>0){?>
									<tr class="">
										<th colspan=""></th>
										<th class="text-right"><button type="button" data-toggle="modal" data-target="#make-payment" id="submit-order2" class="btn btn-primary">Make Payment</button></th>
									</tr>
									<?php }?>

									<!-- <tr class="">
										<td colspan="">Paid Amount</td>
										<td class="text-right"><div class="form-group"><input  type="text" name="credit" value="" class="form-control" required="required" number="true"></div></td>
									</tr>
									<tr class="">
										<td colspan="">Payment Method</td>
										<td class="text-right"><div class="form-group"><input  type="text" name="via" value="" class="form-control" required="required"></div></td>
									</tr>
									<tr class="">
										<td colspan="">Transaction Number</td>
										<td class="text-right"><div class="form-group"><input  type="text" name="transaction_number" value="" class="form-control" required="required"></div></td>
									</tr> -->
								</table>
							</div>
						</div>
					</div>


				</div>
			</div>
			<style>
			table.table tr.b-t th,table.table tr.b-t td{
				border-top: 1px solid #999;
			}
			table.table tr.b-b th,table.table tr.b-b td{
				border-bottom: 1px solid #999;
			}
		</style>

		<script>
			<?php if($is_payment>0){?>
				$('#submit-order').hide();
				<?php }else{?>
					$('#submit-order').show();
					<?php }?>
				</script>

