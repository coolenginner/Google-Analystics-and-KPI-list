<?php $this->load->view('includes/head'); ?>
<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/admin/css/bootstrap-switch.css"/>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/sliders/ion_rangeslider.min.js"></script>
<style>
.urdu-font{
	font-family: 'Noto Nastaliq Urdu Draft', serif;
	line-height: 2;
}
.table-xxs > thead > tr > th,
.table-xxs > tbody > tr > th,
.table-xxs > tfoot > tr > th,
.table-xxs > thead > tr > td,
.table-xxs > tbody > tr > td,
.table-xxs > tfoot > tr > td {
  padding: 4px 10px;
}
<?php if(isset($report) && $report==1){?>
.sidebar.sidebar-main,
.navbar.navbar-default.header-highlight,
input[type="submit"]{
	display: none;
}
.content.m-t-md,.panel-body{
	padding: 0;
}
<?php }?>
</style>
<div class="panel panel-flat">
    <div class="panel-heading">
       <h5 class="panel-title"><?php echo isset($page_title)?$page_title:'';?>
       	<div class="pull-right">
       		<div class="heading-btn-group">
   
   
       			
       		
       		</div>
       	</div>
   
       </h5>
   </div>
    <div class="panel-body">
    	<form action="" method="post" id="evaluation-form">
    		<input type="hidden" name="map_id" value="<?php echo isset($employee->map_id)?$employee->map_id:0;?>">
    		<input type="hidden" name="map_d" value="<?php echo isset($form[0]->normal_distribution)?$form[0]->normal_distribution:0;?>">
<?php 
$total_cands = isset($total_cands)?$total_cands:0;
$fifteen = ($total_cands*0.15);
$fifteen = round($fifteen);
$seventy = $total_cands-($fifteen*2);
$total_questions = isset($form)?count($form):0;
$q_ar = isset($form_data['questions'])?$form_data['questions']:[];
$remarks = isset($form_data['remarks'])?$form_data['remarks']:[];
?>
<?php if(isset($form[0]->normal_distribution) && $form[0]->normal_distribution==1){?>
	<div class="col-md-8">
<h4 class="m-t-none">Appraisee: <?php echo isset($employee->first_name)?$employee->first_name:'';?></h4>
<h6>Job Title: <?php echo isset($employee->job_title)?$employee->job_title:'';?></h6>
<h6>Department: <?php echo isset($employee->department)?$employee->department:'';?></h6>
	</div>
    		<div class="col-md-4">
    			<div class="table-responsive text-xs">
    				<table class="table table-xxs table-striped b">
    					<thead>
    						<tr>
    							<th width="50%" colspan="2">Range</th>
    							<th width="25%">Participants</th>
    							<th width="25%">Distribution</th>
    							
    							
    						</tr>
    					</thead>
    					<tbody>
    					<tr>
    						<td>0</td>
    						<td><?php echo ($total_questions*1);?></td>
    						<td rowspan="2"><?php echo $fifteen;?></td>
    						<td rowspan="2">15%</td>
    						
    					</tr>

    					<tr>
    						<td><?php echo ($total_questions*1)+0.1;?></td>
    						
    						<td><?php echo ($total_questions*2);?></td>
    						
    					</tr>
    					<tr>
    						<td><?php echo ($total_questions*2)+0.1;?></td>
    						<td><?php echo ($total_questions*3);?></td>
    						<td rowspan="2"><?php echo $seventy;?></td>
    						<td rowspan="2">70%</td>
    					</tr>
    					<tr>
    						<td><?php echo ($total_questions*3)+0.1;?></td>
    						<td><?php echo ($total_questions*4);?></td>
    						
    					</tr>
    					<tr>
    						<td><?php echo ($total_questions*4)+0.1;?></td>
    						<td><?php echo ($total_questions*5);?></td>
    						<td><?php echo $fifteen;?></td>
    						<td>15%</td>
    					</tr>
    					

    					</tbody>

    				</table>

    			</div>
    		</div>
    	<?php }?>
    	
								<div class="clearfix"></div>
    		<div class="clearfix m-b-sm"></div>
    		<div class="table-responsive">
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th width="60%">Question</th>
    						<th width="2%">1</th>
    						<th width="2%">2</th>
    						<th width="2%">3</th>
    						<th width="2%">4</th>
    						<th width="2%">5</th>
    						<th width="30%">Remarks</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php if(isset($form)){
    						$LP=1;
    						$answers = (isset($employee->answers) && $employee->answers!='')?unserialize($employee->answers):[];
    						foreach($form as $question){

    							if($question->type=='slider'){
    								$key = array_search($question->id, $q_ar);
    								$is_remarks = isset($remarks[$key])?$remarks[$key]:0;
    								$cur_answer=isset($answers[$question->id])?$answers[$question->id]:0;
    								$cur_score = isset($cur_answer['score'])?$cur_answer['score']:0;
    								$cur_remarks = isset($cur_answer['remarks'])?$cur_answer['remarks']:'';
?>
<tr>
    								<td>
    									<script>

    										$(document).ready(function(){
    											$("#ion-start<?php echo isset($question->id)?$question->id:0;?>").ionRangeSlider({
    												//disable: true,
    												step: 0.1,
    												min: 1,
    												max: 5,
    												onStart: function (data) {
    													saveResult(data,<?php echo isset($question->id)?$question->id:0;?>);
    												},
    												onChange: function (data) {
    													saveResult(data,<?php echo isset($question->id)?$question->id:0;?>);
    												},
    												onFinish: function (data) {
    													saveResult(data,<?php echo isset($question->id)?$question->id:0;?>);
    												},
    												from: <?php echo $cur_score;?>
    											});
    										});
    									</script>
    									<input type="hidden" name="question_idx[]" value="<?php echo isset($question->id)?$question->id:0;?>">
    									<input type="hidden" name="type_x[]" value="<?php echo isset($question->type)?$question->type:'radio';?>">
    									<input type="hidden" id="slide<?php echo isset($question->id)?$question->id:0;?>" name="slide_<?php echo isset($question->id)?$question->id:0;?>" value="<?php echo $cur_score;?>">
    									<h6 class="m-t-none"><?php echo isset($question->title)?$LP.' - '.$question->title:'';?></h6>
    									<?php if(isset($question->desc_en) && $question->desc_en!=''){?>
    									<p class="m-l-md m-b-none"><?php echo $question->desc_en;?></p>
    								<?php }?>
    								<?php if(isset($question->desc_ur) && $question->desc_ur!=''){?>
    									<p class="text-sm urdu-font m-l-md"><?php echo $question->desc_ur;?></p>
    								<?php }?>
    									
    										
    									</td>
    									<td colspan="5">
    										<div id="ion-start<?php echo isset($question->id)?$question->id:0;?>"></div>

    										
    									</td>
    								
    								<td><?php if($is_remarks==1){ ?><textarea name="remarks[]" class="form-control"><?php echo $cur_remarks;?></textarea><?php }else{?><input type="hidden" name="remarks[]" value=""><?php }?></td>
    							</tr>

<?php 

    							}else if($question->type=='radio'){
    								$key = array_search($question->id, $q_ar);
    								$is_remarks = isset($remarks[$key])?$remarks[$key]:0;
    								$cur_answer=isset($answers[$question->id])?$answers[$question->id]:0;
    								$cur_score = isset($cur_answer['score'])?$cur_answer['score']:0;
    								$cur_remarks = isset($cur_answer['remarks'])?$cur_answer['remarks']:'';
    								?>
    								
    							<tr>
    								<td>
    									<h6 class="m-t-none"><?php echo isset($question->title)?$LP.' - '.$question->title:'';?></h6>
    									<?php if(isset($question->desc_en) && $question->desc_en!=''){?>
    									<p class="m-l-md m-b-none"><?php echo $question->desc_en;?></p>
    								<?php }?>
    								<?php if(isset($question->desc_ur) && $question->desc_ur!=''){?>
    									<p class="text-sm urdu-font m-l-md"><?php echo $question->desc_ur;?></p>
    								<?php }?>
    									
    										
    									</td>
    								<td><input <?php if(isset($cur_score) && $cur_score==1){echo 'checked';}?> data-switch-no-init type="radio" name="question_<?php echo isset($question->id)?$question->id:0;?>" value="1"></td>
    								<td><input <?php if(isset($cur_score) && $cur_score==2){echo 'checked';}?> data-switch-no-init type="radio" name="question_<?php echo isset($question->id)?$question->id:0;?>" value="2"></td>
    								<td><input <?php if(isset($cur_score) && $cur_score==3){echo 'checked';}?> data-switch-no-init type="radio" name="question_<?php echo isset($question->id)?$question->id:0;?>" value="3"></td>
    								<td><input <?php if(isset($cur_score) && $cur_score==4){echo 'checked';}?> data-switch-no-init type="radio" name="question_<?php echo isset($question->id)?$question->id:0;?>" value="4"></td>
    								<td>
    									<input <?php if(isset($cur_score) && $cur_score==5){echo 'checked';}?> data-switch-no-init type="radio" name="question_<?php echo isset($question->id)?$question->id:0;?>" value="5">
    									<input type="hidden" name="question_idx[]" value="<?php echo isset($question->id)?$question->id:0;?>">
    									<input type="hidden" name="type_x[]" value="<?php echo isset($question->type)?$question->type:'radio';?>">
    								</td>
    								<td><?php if($is_remarks==1){ ?><textarea name="remarks[]" class="form-control"><?php echo $cur_remarks;?></textarea><?php }else{?><input type="hidden" name="remarks[]" value=""><?php }?></td>
    							</tr>
    						<?php }else{
    							$cur_answer=isset($answers[$question->id])?$answers[$question->id]:'';
$cur_score = isset($cur_answer['score'])?$cur_answer['score']:0;
    								$cur_remarks = isset($cur_answer['remarks'])?$cur_answer['remarks']:'';
    							?>
<tr>
    								<td><input type="hidden" name="question_idx[]" value="<?php echo isset($question->id)?$question->id:0;?>">
    									<input type="hidden" name="type_x[]" value="<?php echo isset($question->type)?$question->type:'textarea';?>"><?php echo isset($question->title)?$question->title:'';?></td>
    								<td colspan="5">
<textarea name="question_<?php echo isset($question->id)?$question->id:0;?>" class="form-control"><?php echo $cur_score;?></textarea><input type="hidden" name="remarks[]" value="">
    								</td>
    							</tr>
    						<?php }?>
    						<?php $LP++;}}?>



    					</tbody>
    				</table>
    			</div>
    			<input type="submit" id="submit" value="Submit" class="btn btn-primary pull-right m-r-md m-t-lg">
    		</form>
    </div>

    

    
    

</div>


<style>
.irs-from, .irs-to, .irs-single{
	font-size:14px;
}
.irs-min,.irs-max{
	display: none;
}
.select2-selection.select2-selection--single{
	min-width: 350px;
} </style>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
	var saveResult = function (data,id) {
		/*console.log(data);
		console.log(id);*/
		from = data.from;
		$('#slide'+id).val(from);
		

	};
	var table='';
   $(document).ready(function() {
   	// Define element



   	$('.select2').select2();
   	$('#evaluation-form').on('submit', function (e) {
   		e.preventDefault();
   		var form_Obj = $(this);
   		var form_valid=1;
   		$.ajax({
   			url: "<?php echo site_url('dashboard/validate_rating'); ?>",
   			type: "POST",
   			dataType:'json',
   			data:  $('#evaluation-form').serialize(),
   			success: function (response) {
   				
   				console.log(response);
   				if(response.warn==1){
   					form_valid=0;
   					alert(response.msg);	
   				}

   				
   				if(form_valid==1){
   					//alert(form_valid);
   					 form_Obj.unbind('submit').submit();
   					 $('#submit').trigger('click');

   				}

   			},
   			error: function (jqXHR, textStatus, errorThrown) {
   				alert('Something went wrong, Try again.');
   			}
   		});

   		/*return false;


   		$("form#evaluation-form").validate({
   			errorElement: 'span',
   			errorClass: 'help-block',
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
   				$('html, body').animate({
   					scrollTop: $(validator.errorList[0].element).parent().offset().top
   				}, 0);
   			},
   			errorPlacement: function (error, element) {
   				if (element.closest('.i-checks').size() === 1) {
   					error.insertAfter(element.closest('.i-checks'));
   				} else {
   					error.insertAfter(element);
   				}
   				if (element.closest('.i-select').size() === 1) {
   					error.insertAfter(element.closest('.i-select'));
   				} else {
   					error.insertAfter(element);
   				}
   				if (element.closest('.custom_select_box').size() === 1) {
   					error.insertAfter(element.closest('.custom_select_box'));
   				} else {
   					error.insertAfter(element);
   				}
   			},
   			messages: {
   			},
   			submitHandler: function (formSelector) {

   				var form_Obj = $(formSelector);
   				function load_fun(){
   					formSelector.submit();
   				}
   				//form_Obj.submit();	
   				

   				
   				
   			}
   		});*/
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