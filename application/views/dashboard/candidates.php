<?php $this->load->view('includes/head'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>

<div class="panel panel-flat">
   <!--  <div class="panel-heading">
       <h5 class="panel-title">Mapping
       	<div class="pull-right">
       		<div class="heading-btn-group">
   
   
       			<?php if (isset($add_link) && $add_link != '') { ?>
       			<a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
       			<?php } ?>
       		
       		</div>
       	</div>
   
       </h5>
   </div> -->
    <div class="panel-body">
    	<form action="" method="get" class="form-inline" role="form">
    	<label class="" for="">Filter by Status </label>
    		<div class="form-group">
    			<!-- <label class="" for="">Filter </label> -->
    			<select class="form-control select2"  name="status" style="width:350px !important;">
    				<option disabled="disabled" selected="selected"></option>
                				<?php
$status = $this->input->get('status')?$this->input->get('status'):'';
                				
                						?>
                				<option <?php if(isset($status) && $status=='Pending'){echo 'selected';}?> value="Pending">Pending</option>
                				<option <?php if(isset($status) && $status=='Partial'){echo 'selected';}?> value="Partial">Partial</option>
                				<option <?php if(isset($status) && $status=='Completed'){echo 'selected';}?> value="Completed">Completed</option>
                				
                				

                			</select>

    			
    		</div>
    	
    		
    	
    		<button type="submit" class="btn btn-primary">Submit</button>
    		<a href="<?php echo site_url('dashboard/candidates');?>" class="btn btn-primary">Reset</a >
    	</form>
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
                
                
                <th width="50%">Appraisee</th>
                <th>Total Score</th>
                <th>Obtained Score</th>
                <th>Status</th>
                <!-- <th>Created Datetime</th> -->
                <!-- <th>Last Updated</th> -->
                
               <th>Action</th>
                <!--<th class="text-center" style="width: 175px;">Action</th>-->
            </tr>
        </thead>
        <tbody>
           

        </tbody>
    </table>

    
    

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
.select2-selection.select2-selection--single{
	min-width: 350px;
} </style>
<?php $this->load->view('includes/footer'); ?>
<script>
	var table='';
   $(document).ready(function() {
   	$('.select2').select2();
    table = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [],
          "searching": false,
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list');?>",
            "type": "POST",
            "data":{status:'<?php echo $status;?>'}
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
                   	
                   	glob_obj.closest('tr').remove();
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