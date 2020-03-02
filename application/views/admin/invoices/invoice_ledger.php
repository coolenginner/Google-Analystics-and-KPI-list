<?php 
$order_id = isset($id)?$id:0;
$qry="SELECT P.* FROM cs_payments P
inner join cs_orders O on O.id=P.order_id
 where P.order_id=?  order by P.id desc";
$qry=$this->db->query($qry,[$order_id]);
$results = $qry->result();


?>

<div class="modal fade" id="order_ledger">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order Payments</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered ">
						<thead>
							<tr>
								<th>Payment Method</th>
								<th>Transation Number</th>
								<th>Invoice Transation</th>
								
								<th>Wallet</th>
								<th>Payment</th>
								
								<th>Date Time</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$ledger_total=0; 
							if(count($results)>0){

								foreach($results as $row){
									$customer_balance= isset($row->customer_balance)?$row->customer_balance:0;
									$use_wallet= isset($row->use_wallet)?$row->use_wallet:0;
									$credit= isset($row->credit)?$row->credit:0;

									$ledger_total = $ledger_total+$credit;
									?>
<tr>
	<td><?php echo isset($row->via)?$row->via:'';?></td>
	<td><?php echo isset($row->transaction_number)?$row->transaction_number:'';?></td>
	<td><?php echo $credit;	?></td>
	
	<td><?php 
		if($customer_balance>0){
			if($use_wallet==1){
				echo ' - '.$customer_balance;	
			}else{
				echo ' + '.$customer_balance;
			}
			
		}else{
			//echo $credit;
		}

	?></td>
	<td><?php 
		if($customer_balance>0){
			if($use_wallet==1){
				echo ($credit-$customer_balance);	
			}else{
				echo ($credit+$customer_balance);
			}
			
		}else{
			echo $credit;
		}

	?></td>
	<td><?php echo isset($row->created_datetime)?date('jS F, Y H:i',strtotime($row->created_datetime)):'';?></td>
</tr>

									<?php
								} ?>
								<tr>

									<th colspan="2">Total</th>
									<th><?php echo number_format($ledger_total);?></th>
									<th></th>
								</tr>
							<?php }
							?>
						</tbody>
					</table>	
			</div>
			
		</div>
	</div>
</div>

