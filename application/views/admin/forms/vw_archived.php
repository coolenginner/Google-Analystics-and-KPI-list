<?php $this->load->view('admin/includes/head'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<form method="post" id="employees">
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Archived Forms
        	<div class="pull-right">
        		<div class="heading-btn-group">


        			<?php if (isset($add_link) && $add_link != '') { ?>
        			<a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
        			<a href="javascript:;" class="btn btn-sm btn-danger bulk_delete_btn"><i class="fa fa-trash"></i> Delete</a>
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
                <th  class="no-sort">Form Number</th>
                <th>Title</th>
                <th>Total Questions</th>
                <th>Created Datetime</th>
                <th>Last Updated</th>
                
               <th>Action</th>
                <!--<th class="text-center" style="width: 175px;">Action</th>-->
            </tr>
        </thead>
        <tbody>
           

        </tbody>
    </table>
     <div class="col-xs-12" style="margin-top: -28px;margin-left: 5px;">
    	<label><input data-switch-no-init type="checkbox" id="select_all" value="1"> Select All</label>
    </div>

    
    

</div>
</form>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Restore</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to restore this form?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="Delete_Joke">Yes</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script>
	$(document).on('keypress',function(event){
		var modal_status = $('#modal-id').css('display');
		if(event.keyCode == 13 && modal_status =='block') {
			$('#Delete_Joke').trigger('click');

		}
	});
	$(document).on('click','#select_all',function() {
		if($(this).is(':checked')){
			$('.bulk_delete').prop('checked',true);	
		}else{
			$('.bulk_delete').prop('checked',false);
		}
		
	});
	$(document).on('click','.bulk_delete_btn',function(){
    	var total_selected = $('.bulk_delete:checked').length;
    	//alert(total_selected);
    	if(total_selected>0){
    		$('#employees').submit();	
    	}else{
    		alert('Please select atleast 1 participant.');
    	}
    });
	var table='';
   $(document).ready(function() {
    table = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [],
        "ajax": {
            "url": "<?php echo site_url('admin/forms/ajax_list');?>",
            "type": "POST",
            data:{archived:1}
        },
       
    });
    var glob_obj = '';
    $(document).on('click','.delete_joke',function(){
    	glob_obj = $(this);
    	console.log(glob_obj.closest('tr'));
    	var form_id = $(this).data('id');
    	$('#modal-id').attr('data-id',form_id);
    });
    $(document).on('click','#Delete_Joke',function(){
    	var form_id = $('#modal-id').attr('data-id');
    	$.ajax({
                url: "<?php echo base_url(); ?>admin/forms/restore",
                type: "POST",
                data: {form_id:form_id},
                success: function (response) {
                   
                  	//console.log(glob_obj);
                   //if(response.data)
                   {
                   	table
        .row( glob_obj.parents('tr') )
        .remove()
        .draw();
                   	//glob_obj.closest('tr').remove();
                   	//table.reload();
                   	//table.clear().draw();
                   	$('#modal-id').modal('hide');
                   }
                   


                },
                error: function (jqXHR, textStatus, errorThrown) {
                  alert('Something went wrong, Try again.');

                }


            });
    });
} );

</script>