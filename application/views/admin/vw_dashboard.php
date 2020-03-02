<?php $this->load->view('admin/includes/head'); ?>
<script src="<?php echo site_url('assets/js/plugins/pickers/datepicker.js');?>"></script>

<?php
//echo '<pre>';
//print_R($_SESSION);
?>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map-canvas {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
    }
    #mapContainer{
        height: 450px;
    }
</style>
<div class="row">
    <div class="col-lg-3 col-xs-6 hidden">
        <!-- small box -->
        <div class="panel bg-teal-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <i class="fa fa-shopping-cart"></i>
                </div>

                <h3 class="no-margin"><?php echo isset($totla_orders) ? $totla_orders : 0 ?></h3>
                Total Orders
            </div>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6 hidden">
        <div class="panel bg-pink-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <i class="fa fa-user"></i>
                </div>
                <h3 class="no-margin"><?php echo isset($totla_customers) ? $totla_customers : 0 ?></h3>
                Total Registered  Customers
            </div>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6 hidden">
        <div class="panel bg-blue-400">
            <div class="panel-body">

                <div class="heading-elements">
                    <i class="icon-home4"></i>
                </div>
                <h3 class="no-margin"><?php echo isset($totla_shops) ? $totla_shops : 0 ?></h3>
                Total Shops
            </div>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6 hidden">
        <div class="panel bg-purple-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <i class="fa fa-tags fw"></i>
                </div>
                <h3 class="no-margin"><?php echo isset($totla_products) ? $totla_products : 0 ?></h3>
                Total Products
            </div>
        </div>
    </div><!-- ./col -->
</div>

        <div class="panel panel-flat">
            <div class="panel-body" style="min-height: 400px">
                <div class="row">
                	<div class="col-lg-4 col-sm-12 hidden">
                		<div class="form-group">
                			<select name="choose_name" id="choose_name" class="form-control">
                				<?php if(isset($availableData) && count($availableData)>0){
                					foreach($availableData as $availableKey=>$availableRow){
                						$selected='';
                						if(isset($profileId) && $profileId==$availableKey){
                							$selected='selected';
                						}
                						?>
                						<option <?php echo $selected;?> value="<?php echo $availableKey;?>"><?php echo $availableRow;?></option>
                					<?php }}?>

                				</select>
                			</div>
                		</div>
                </div>

                <div class="row">
                	<div class="col-lg-3 col-md-4 col-sm-12">
                		<div class="form-group">
                			<label>Start Date</label>
                			<input type="text" name="start" id="start" value="<?php echo date('Y-m-d',strtotime('-1 day'));?>" class="form-control">
                		</div>
                	</div>
                	<div class="col-lg-3 col-md-4 col-sm-12">
                		<div class="form-group">
                			<label>End Date</label>
                			<input type="text" name="end" id="end" value="<?php echo date('Y-m-d',strtotime('-1 day'));?>" class="form-control">
                		</div>
                	</div>
                	<div class="col-lg-3 col-md-4 col-sm-12">
                		<div class="form-group">
                			<label>KPI</label>
                			<select class="form-control" name="kpi" id="kpi">
                				<option value="1">Sessions and Users</option>
                				<option value="3">Bounce Rate</option>
                				<option value="11">Users by Gender</option>
                				<option value="9">Average Session Duration</option>
                				<option value="6">Average Page Load Time</option>
                				<option value="2">New and Returning Visitors</option>
                				<option value="4">Goal Conversion Rate</option>
                				<option value="5">Time on Page</option>
                				<option value="12">Pages per Session</option>
                				
                				<option value="7">Bounce Rate by Browser</option>
                				<option value="8">Organic vs Paid Sessions</option>
                				
                				
                				<option value="13">Best Pages by Gender</option>
                				<option value="14">Top 10 Landing Pages</option>
                				<option value="10">Top 5 Search Queries</option>
                			</select>
                		</div>
                	</div>
                	<div class="col-lg-3 col-md-4 col-sm-12">
                		<div class="form-group">
                			<label></label>
                			<button style="margin-top: 26px;" type="button" name="filter" id="filter"  class="btn btn-primary">Filter Data</button>
                		</div>
                	</div>
                </div>
                <?php if(isset($is_data) && $is_data==1){?>
                <h5>Total Sessions: <?php echo $total_sessions;?>
            <?php }else{?>
            	<!-- <h5>No data available.</h5> -->
            <?php }?>
            <?php if(isset($is_data2) && $is_data2==1){?>
                <h5>Total Users: <?php echo $total_users;?></h5>
          
            <?php }?>
            </div>
        </div>

<div id="loadModal"></div>


<?php $this->load->view('admin/includes/footer'); ?>


<script>
$(document).ready(function(){

	$('#filter').on('click',function(){
		var startDate = $('#start').val();
		var endDate = $('#end').val();
		var kpi = $('#kpi').val();
		$.ajax({
			url: '<?php echo site_url('admin/dashboard/getData');?>',
			type: 'POST',
			dataType: 'JSON',
			data: {
				startDate: startDate,
				endDate: endDate,
				kpi: kpi,
				
			},
			beforeSend:function(){
				$('#filter').attr('disabled','disabled').html('<i class="fa fa-gear fa-spin"></i> Filter Data');
			},
			complete:function(){
				$('#filter').removeAttr('disabled').html('Filter Data');
			},
			success:function(response){
				$('#loadModal').html(response.data);
				$('#modal-id').modal('show');
			}
		});
		
	})
	$('#start').datepicker({ 
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
		// startDate: new Date(),
		endDate: new Date(new Date().setDate(new Date().getDate() - 1)),
		onSelect: function(text, dt) {
			$('#end').datepicker('option', 'minDate', text);
		}
	}).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end').val('');
        $('#end').datepicker('setStartDate', minDate);
    });
	
    $('#end').datepicker({ 
    	format: 'yyyy-mm-dd',
       endDate: new Date(new Date().setDate(new Date().getDate() - 1))
    });
	$('#choose_name').on('change',function(){

		window.location.href='<?php echo site_url('admin/dashboard?profileId='); ?>'+$(this).val();
	})
});
</script>