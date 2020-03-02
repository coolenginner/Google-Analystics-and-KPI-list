<?php $this->load->view('includes/head'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<div class="panel panel-flat">
    <!-- <div class="panel-heading">
        <h5 class="panel-title">Forms
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
    	<div class="row">
    		<div class="col-lg-4">
    			<div class="panel bg-blue-300">
    				<div class="panel-body">
    					
    					<h3 class="no-margin"><?php echo isset($total_candidates)?$total_candidates:0;?></h3>
    					Total Candidates

    				
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-4">
    			<div class="panel bg-success-300">
    				<div class="panel-body">
    					
    					<h3 class="no-margin"><?php echo isset($completed_candidates)?$completed_candidates:0;?></h3>
    					Evaluated Candidates
    				
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-4">
    			<div class="panel bg-warning-300">
    				<div class="panel-body">
    					
    					<h3 class="no-margin"><?php echo isset($pending_candidates)?$pending_candidates:0;?></h3>
    					Pending Candidates
    				
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this order?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="Delete_Joke">Yes</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
	var table='';
   $(document).ready(function() {
    table = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [],
        "ajax": {
            "url": "<?php echo site_url('admin/forms/ajax_list');?>",
            "type": "POST"
        },
    });
    var glob_obj = '';
    $(document).on('click','.delete_joke',function(){
    	glob_obj = $(this);
    	console.log(glob_obj.closest('tr'));
    	var joke_id = $(this).data('id');
    	$('#modal-id').attr('data-id',joke_id);
    });
    $(document).on('click','#Delete_Joke',function(){
    	var joke_id = $('#modal-id').attr('data-id');
    	$.ajax({
                url: "<?php echo base_url(); ?>admin/jokes/delete_joke",
                type: "POST",
                data: {joke_id:joke_id},
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