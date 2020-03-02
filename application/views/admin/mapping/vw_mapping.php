<?php $this->load->view('admin/includes/head'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Mapping
        	<div class="pull-right">
        		<div class="heading-btn-group">


        			<?php if (isset($add_link) && $add_link != '') { ?>
        			<a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
        			<a href="<?php echo site_url('admin/mapping/import'); ?>" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> Import</a>
        			<a href="javascript:;" class="btn btn-sm btn-danger bulk_delete_btn"><i class="fa fa-trash"></i> Delete</a>
        			<?php } ?>
        		
        		</div>
        	</div>

        </h5>
    </div>
   
    <div class="panel-body">
    	<form action="" method="get" class="form-inline" role="form">
    	<label class="" for="">Filter by Evaluator </label>
    		<div class="form-group">
    			<!-- <label class="" for="">Filter </label> -->
    			<select class="form-control select2"  name="evaluator_id" style="width:350px !important;">
    				<option disabled="disabled" selected="selected"></option>
                				<?php
$get_evaluator = $this->input->get('evaluator_id')?$this->input->get('evaluator_id'):0;
                				 if(isset($evaluators) && count($evaluators)>0){
                					foreach($evaluators as $emp){
                						$userData='';
                						$employee_id = isset($emp->employee_id)?$emp->employee_id:'';
                						$first_name = isset($emp->first_name)?$emp->first_name:'';
                						$last_name = isset($emp->last_name)?$emp->last_name:'';
                						$userData = $employee_id.' - '.$first_name.' '.$last_name;
                						?>
                				<option <?php if(isset($emp->id) && $emp->id==$get_evaluator){echo 'selected';}?> value="<?php echo isset($emp->id)?$emp->id:0;?>"><?php echo $userData;?></option>
                				<?php }}?>
                				

                			</select>

    			
    		</div>
    	
    		
    	
    		<button type="submit" class="btn btn-primary">Submit</button>
    		<a href="<?php echo site_url('admin/mapping');?>" class="btn btn-primary">Reset</a >
    	</form>
    </div>
    <?php
    $user_data = $this->session->userdata('shoppalatt_admin');
    $admin_id = isset($user_data['user_id']) ? $user_data['user_id'] : 0;
    $user_data_shop = $this->session->userdata('shoppalatt_shop');
    $shop_id = isset($user_data_shop['shop_id']) ? $user_data_shop['shop_id'] : 0;
    $admin_uri = $this->uri->segment(1);
    ?>
 <form method="post" id="employees">
    <!-- <div class=" ">-->
    <table class="table " id="example">
        <thead>
            <tr>
                
                <th widh="2%"></th>
                <th>Appraiser</th>
                <th>Appraisee</th>
                <th>Status</th>
                <!-- <th>Created Datetime</th> -->
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

    </form>
    

</div>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this mapping?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="Delete_Joke">Yes</button>
			</div>
		</div>
	</div>
</div>
<style>
.panel  .dataTables_wrapper .datatable-header, .panel  .dataTables_wrapper .datatable-footer
{
	padding-right: 20px;
}
.select2-selection.select2-selection--single{
	min-width: 350px;
} </style>
<?php $this->load->view('admin/includes/footer'); ?>
<script>
	$(document).on('keypress',function(event){
		var modal_status = $('#modal-id').css('display');
		if(event.keyCode == 13 && modal_status =='block') {
			$('#Delete_Joke').trigger('click');

		}
	});
	$(document).on('click','.bulk_delete_btn',function(){
    	var total_selected = $('.bulk_delete:checked').length;
    	//alert(total_selected);
    	if(total_selected>0){
    		$('#employees').submit();	
    	}else{
    		alert('Please select atleast 1 mapping.');
    	}
    });
     $(document).on('click','#select_all',function() {
		if($(this).is(':checked')){
			$('.bulk_delete').prop('checked',true);	
		}else{
			$('.bulk_delete').prop('checked',false);
		}
		
	});
	var table='';
   $(document).ready(function() {
   	$('.select2').select2();
    table = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [],
          "searching": false,
        "ajax": {
            "url": "<?php echo site_url('admin/mapping/ajax_list');?>",
            "type": "POST",
            "data":{evaluator_id:'<?php echo $get_evaluator;?>'}
        },
       
    });
    var glob_obj = '';
    $(document).on('click','.delete_joke',function(){
    	glob_obj = $(this);
    	console.log(glob_obj.closest('tr'));
    	var map_id = $(this).data('id');
    	$('#modal-id').attr('data-id',map_id);
    });
    $(document).on('click','#Delete_Joke',function(){
    	var map_id = $('#modal-id').attr('data-id');
    	$.ajax({
                url: "<?php echo base_url(); ?>admin/mapping/delete_mapping",
                type: "POST",
                data: {map_id:map_id},
                success: function (response) {
                   
                  	//console.log(glob_obj);
                   //if(response.data)
                   {
                   	
                   	//glob_obj.closest('tr').remove();

                   	
                   	table
        .row( glob_obj.parents('tr') )
        .remove()
        .draw();
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