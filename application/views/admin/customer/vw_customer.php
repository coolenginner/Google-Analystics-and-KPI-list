<?php $this->load->view('admin/includes/head',['body'=>'sidebar-xs']); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Customers
			

			<div class="pull-right">
        	<div class="heading-btn-group">


        			<?php if (isset($add_link) && $add_link != '') { ?>
        			<a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
        			<?php } ?>
        			
        		</div>
        	</div>
        </h5>
    </div>
    <?php
    $user_data = $this->session->userdata('shoppalatt_admin');
    $admin_id = isset($user_data['user_id']) ? $user_data['user_id'] : 0;
    $user_data_shop = $this->session->userdata('shoppalatt_shop');
    $shop_id = isset($user_data_shop['shop_id']) ? $user_data_shop['shop_id'] : 0;
    $admin_uri = $this->uri->segment(1);
    ?>

    <!-- <div class=" ">-->
    <table class="table " id="example">
        <thead>
            <tr>
                <th  class="no-sort">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Phone</th>
                <th>City</th>
                <th>Credit Balance</th>
                <th>Date Added</th>
               <!-- <th>Status</th> -->
                <th class="text-center" style="width: 175px;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($results) && count($results) > 0) {
                foreach ($results as $key => $value) {
                    $category_id = isset($value->user_id) ? $value->user_id : 0;
                    $name = $first_name = isset($value->first_name) ? $value->first_name : '';
                    $last_name = isset($value->last_name) ? $value->last_name : '';
                    if($last_name!=''){
                    	$name = $name.' '.$last_name;
                    }
                    $created_datetime = isset($value->created_datetime) ? date_create($value->created_datetime) : '';
                    
                    ?>
                    <tr>
                        
                        <td><?php echo isset($value->id) ? $value->id : '' ?></td>
                        <td><?php echo $name; ?></td>
                        <td>
                            <?php echo isset($value->email) ? $value->email : '' ?>
                        </td>
                        <td><?php echo isset($value->phone) ? $value->phone : '' ?></td>
                        <td><?php echo isset($value->city) ? $value->city : '' ?></td>
                        <td> <?php echo isset($value->created_datetime) ? date_format($created_datetime, 'M j, Y') : '' ?></td>
                       
                        <?php /*  <td>
                          <?php
                          if (isset($value->status) && $value->status == 1) {
                          ?>
                          <span class="label label-success">Active</span>
                          <?php } else { ?>
                          <span class="label label-default">InActive</span>
                          <?php } ?>
                          </td> */ ?>
                        <td class="text-center">
                       			<a href="<?php echo site_url('admin/customers/edit/'.$value->id);?>" class="btn btn-sm btn-primary pull-right"> Edit</a>     
                        </td> 
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">No record found</td>

                </tr>
            <?php }
            ?>

        </tbody>
    </table>


<div class="modal fade" id="add-wallet">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Balance (<span class="customer_Name"></span>)</h4>
			</div>
			<div class="modal-body">
				<div class="MSG"></div>
				<form class="amount-form" method="post" action="">
					<input type="hidden" name="customer_id" value="" id="customer_ID">
					<?php $this->load->view('admin/invoices/payment-form');?>
				</form>
			</div>
			
		</div>
	</div>
</div>
    <!-- </div>-->
    <?php /*  <div class="datatable-footer">
      <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite"></div>
      <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
      <?php echo isset($links) ? $links : ''; ?>
      </div>
      </div> */ ?>

</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {

    	$(document).on('click','.add-money', function () {
    		var customer_Name = $(this).closest('tr').find('td:nth-child(2)').text();
    		
    		$('.customer_Name').text(customer_Name);
    		var customer_ID = $(this).attr('data-id');
    		$('#add-wallet #customer_ID').val(customer_ID);
    		
    	});
    	$('.add_amount').on('click', function () {
    		$('#add-wallet .MSG').html('');
            $("form.amount-form").validate({
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
                    //form.submit();
                    $.ajax({
                      url: '<?php echo  site_url('admin/customers/add_amount'); ?>',
                      type: 'POST',
                      dataType: 'json',
                      data: $('.amount-form').serialize(),
                      complete: function(xhr, textStatus) {
                        //called when complete
                      },
                      success: function(data, textStatus, xhr) {
                        if(data.error==1){
                        	$('#add-wallet .MSG').html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Warning!</strong> '+data.msg+'</div>'); 
                        }else{
                        	$('#add-wallet .MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success!</strong> '+data.msg+'</div>');
                        	$('#add-wallet input[type="text"]').val('');
                        	setTimeout(function(){
                        		$('#add-wallet').modal('hide');
                        	},2000);
                        	
                        }
                      },
                      error: function(xhr, textStatus, errorThrown) {
                        //called when there is an error
                      }
                    });
                    
                    
                }
            });
        });
    	table = $('#example').DataTable( {
    		"processing": true,
    		"serverSide": true,
    		"order": [],
    		"ajax": {
    			"url": "<?php echo site_url('admin/customers/ajax_list');?>",
    			"type": "POST"
    		},

    	});
        $('input[type=checkbox]').on('switchChange.bootstrapSwitch', function (event, state) {
            var ButtonValue = this.value;
            var buttonState = $(this).bootstrapSwitch('state');
            console.log(buttonState);
            //console.log(buttonState);
            var status;


            if (buttonState == true)
            {
                status = 1;
            } else {
                status = 0;
            }
            $.ajax({
                url: "<?php echo base_url(); ?>admin/user/ActiveOrInactiveUser",
                type: "post",
                data: {status: status, user_id: ButtonValue},
                success: function (response) {
                    //user_warning user_warn_paragraph
                    //user_succ_alert user_succ_paragraph
                    if (response == "1")
                    {
                        $('#user_warning').hide();
                        $('#alert-success').hide();
                        $('#alert-danger').hide();
                        if (status == 0) {                       
                             $('#user_succ_paragraph').replaceWith('<p id="user_succ_paragraph"><strong>Success ! </strong>User account has been disabled successfully</p>');

                        } else {
                             $('#user_succ_paragraph').replaceWith('<p id="user_succ_paragraph"><strong>Success ! </strong>User account has been enabled successfully</p>');
                        }
                        $('#user_succ_alert').show();
                    } else {
                        $('#user_succ_alert').hide();
                        $('#user_warn_paragraph').replaceWith('<p id="user_succ_paragraph"><strong>Warning ! </strong>  User not updated successfully</p>');
                        $('#user_warning').show();
                    }


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#user_succ_paragraph').hide();
                    $('#user_warn_paragraph').replaceWith('<p id="user_succ_paragraph"><strong>Warning ! </strong>  User not updated successfully</p>');
                    $('#user_warning').show();

                }


            });



        });
    });

</script>