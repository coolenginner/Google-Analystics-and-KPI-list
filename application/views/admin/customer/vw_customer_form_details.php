<?php $this->load->view('admin/includes/head'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_select2.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> Customer (<?php 
                            echo $name = isset($customer_info->name)?$customer_info->name:'';
                            
                            ?>)</h5>
        <!--  <div class="heading-elements">
              <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
              </ul>
          </div>-->
    </div>

    <div class="panel-body">
        <?php
        $user_data = $this->session->userdata('shoppalatt_admin');
        $admin_id = isset($user_data['user_id']) ? $user_data['user_id'] : 0;
        $user_data_shop = $this->session->userdata('shoppalatt_shop');
        $shop_id = isset($user_data_shop['shop_id']) ? $user_data_shop['shop_id'] : 0;
        $admin_uri = $this->uri->segment(1);

        $class = 'col-md-12';
        if ($admin_uri != 'shop') {
            $class = 'col-md-4 col-sm-6';
        }
//      /  print_r($customer_info);
        ?>

        <form action="" method="post" enctype="multipart/form-data" id="form-category" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">

                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Email</h6>
                		<?php 
                		echo  isset($customer_info->email)?$customer_info->email:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Phone</h6>
                		<?php 
                		echo  isset($customer_info->phone)?$customer_info->phone:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Address</h6>
                		<?php 
                		echo isset($customer_info->address)?$customer_info->address:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">City</h6>
                		<?php 
                		echo isset($customer_info->city)?$customer_info->city:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Total Order(s)</h6>
                		<?php 
                		echo isset($customer_info->total)?$customer_info->total:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Pending Order(s)</h6>
                		<?php 
                		echo isset($customer_info->total_pending)?$customer_info->total_pending:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Shipped Order(s)</h6>
                		<?php 
                		echo isset($customer_info->total_shipped)?$customer_info->total_shipped:'';
                		?>
                	</div>
                	<div class="col-md-3 col-sm-6 m-b-md">
                		<h6 class="m-t-none  b-b">Credit Balance</h6>
                		<?php 
                		echo isset($customer_info->balance)?'Rs: '.$customer_info->balance:'';
                		?>
                	</div>








                </div>

                <div class="clearfix"></div>
                <h5 class="">Orders</h5>
<?php 
$qry="select O.* from cs_orders O where O.customer_id = ? group by O.id order by O.id desc";
$qry=$this->db->query($qry,[$customer_info->id]);
$results = $qry->result();

?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Date Placed</th>
							<th>Total Amount</th>
							<th>Advance Payment</th>
							<th>Remaining Balance</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
if(count($results)>0){
	foreach($results as $order){

		$order_status=isset($order->order_status)?$order->order_status:1;
		$label_class='';
            if($order_status==1){
            	$status='Pending';
            	$label_class='label-default';
            }elseif($order_status==2){
            	$status='Processing';
            	$label_class='label-info';
            }else{
            	$status='Shipped';
            	$label_class='label-success';
            }
		

						?>
						<tr>
							<td><?php echo isset($order->id)?$order->id:'';?></td>
							<td><?php echo isset($order->created_datetime)?date('jS M, Y H:i',strtotime($order->created_datetime)):'';?></td>
							<td><?php echo isset($order->total_sale_price)?$order->total_sale_price:0;?></td>
							<td><?php echo isset($order->advance)?$order->advance:0;?></td>
							<td><?php echo isset($order->remaining)?$order->remaining:0;?></td>
							
							
							
							<td><label class="label <?php echo $label_class;?>"><?php echo isset($status)?$status:'';?></label></td>
							<??>
							<td>
								<div class="btn-group text-center">
									<?php
									$add_class='';
									$URL=site_url('admin/invoices/payment/'.$order->customer_id.'/'.$order->id);
									if(isset($order->is_payment) && $order->is_payment==1){
										$add_class=' disabled ';
										$URL='javascript:;';

									}
									?>
									<a href="<?php echo $URL;?>" class="btn btn-sm btn-primary <?php echo $add_class;?>"><i class="fa fa-money"></i></a>
									<a href="'.site_url('admin/customers/details/'.$order->id).'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
								</div>
							</td>
						</tr>
<?php 	}
}else{?>
<tr><td colspan="6">No order found.</td></tr>
<?php }?>
						
					</tbody>
				</table>

            
            </fieldset>



           
        </form>
    </div>

</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script>

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('#submit').on('click', function () {
            $("form#form-category").validate({
                errorElement: 'span',
                errorClass: 'help-block',
                successClass: 'validation-valid-label',
                ignore: ":hidden:not(select)",
                rules: {
                },
                highlight: function (element) {
                    $(element)
                            .closest('.form-group').addClass('has-error');
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },
                invalidHandler: function (form, validator) {
                    if (!validator.numberOfInvalids())
                        return;
                    /*$('html, body').animate({
                     scrollTop: $(validator.errorList[0].element).parent().offset().top
                     }, 0);*/
                },
                errorPlacement: function (error, element) {
                    // Styled checkboxes, radios, bootstrap switch
                    if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container')) {
                        if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                            error.appendTo(element.parent().parent().parent().parent());
                        } else {
                            error.appendTo(element.parent().parent().parent().parent().parent());
                        }
                    }

                    // Unstyled checkboxes, radios
                    else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                        error.appendTo(element.parent().parent().parent());
                    }

                    // Input with icons and Select2
                    else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                        error.appendTo(element.parent());
                    }

                    // Inline checkboxes, radios
                    else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                        error.appendTo(element.parent().parent());
                    }

                    // Input group, styled file input
                    else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                messages: {
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    });
</script>