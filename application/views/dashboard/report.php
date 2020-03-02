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
.footer{
	display: none;
}
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
.form-label{
	float: left;margin-right: 15px;
}
.overflow{
	overflow: hidden;
	
}
@media print {
  a[href]:after {
    content: " (" attr(href) ")";
  }
}
<?php }?>

</style>
<?php 
$total_cands = isset($total_cands)?$total_cands:0;
$fifteen = ($total_cands*0.15);
$fifteen = round($fifteen);
$seventy = $total_cands-($fifteen*2);
$total_questions = isset($form)?count($form):0;
$q_ar = isset($form_data['questions'])?$form_data['questions']:[];
$remarks = isset($form_data['remarks'])?$form_data['remarks']:[];
?>
<div class="panel panel-flat">
  
    <div class="panel-body">
    	<h3 class="text-center m-b-lg">PERFORMANCE APPRAISAL - NON MANAGEMENT</h3>
		<div class=" text-lg">
			<div class="col-xs-4">
				<label class="form-label">Name: </label> <div class="b-b overflow text-md"><?php echo isset($employee->first_name)?$employee->first_name:'';?></div>
			</div>
			<div class="col-xs-4">
				<label class="form-label">Emp Code: </label> <div class="b-b overflow text-md"><?php echo isset($employee->employee_id)?$employee->employee_id:'';?></div>
			</div>
			<div class="col-xs-4">
				<label class="form-label">Grade: </label> <div class="b-b overflow text-md"><?php echo isset($employee->grade)?$employee->grade:'';?></div>
			</div>

			<div style="clear:both;" class="clearfix m-b-lg"></div>
			<div class="col-xs-4">
				<label class="form-label">Department: </label> <div class="b-b overflow text-md"><?php echo isset($employee->department)?$employee->department:'';?></div>
			</div>
			<div class="col-xs-4">
				<label class="form-label">Job Title: </label> <div class="b-b overflow text-md"><?php echo isset($employee->job_title)?$employee->job_title:'';?></div>
			</div>
			<div class="col-xs-4">
				<label class="form-label">Review Period: </label> <div class="b-b overflow text-md ">2017-2018</div>
			</div>
		</div>
		<div style="clear:both;" class="clearfix"></div>

		<?php if(isset($form[0]->normal_distribution) && $form[0]->normal_distribution==1){?>
	
    		<div class="col-md-12 m-t-md m-b-md">
    			<div class="table-responsive text-xs">
    				<table class="table table-xxs table-hover b text-center">
    					<thead>
    						<tr>
    							<th class="text-center" width="60%" colspan="1">Evaluation Criteria</th>
    							<th class="text-center" width="40%">Rating Scale</th>
    							
    							
    							
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<!-- <td class="b-r"></td> -->
    							<td>Out Standing (OS)</td>
    							<td>5</td>
    						</tr>
    						<tr>
    							<!-- <td class="b-r"></td> -->
    							<td>Very Good (V)</td>
    							<td>4</td>
    						</tr>
    						<tr>
    							<!-- <td class="b-r"></td> -->
    							<td>Good (G)</td>
    							<td>3</td>
    						</tr>
    						<tr>
    							<!-- <td class="b-r"></td> -->
    							<td>Improvement (I)</td>
    							<td>2</td>
    						</tr>
    						<tr>
    							<!-- <td class="b-r"></td> -->
    							<td>Unsatisfactory (U)</td>
    							<td>1</td>
    						</tr>
    					

    					</tbody>

    				</table>

    			</div>
    		</div>
    	<?php }?>
    	<div class="clearfix"></div>

<div class="table-responsive col-xs-12">
    			<table class="table factors table-hover b">
    				<thead>
    					<tr>
    						<th width="60%">Factors</th>
    						<th style="padding-left: 0px;padding-right:0px;" padding="0" width="1%">U</th>
    						<th style="padding-left: 0px;padding-right:0px;" padding="0" width="1%">I</th>
    						<th style="padding-left: 0px;padding-right:0px;" padding="0" width="1%">G</th>
    						<th style="padding-left: 0px;padding-right:0px;" padding="0" width="1%">V</th>
    						<th style="padding-left: 0px;padding-right:0px;" padding="0" width="1%">OS</th>
    						<th width="20%">Remarks</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php
$loo = $obtained_score = 0;
    					 if(isset($form)){
    						$LP=1;
    						$answers = (isset($employee->answers) && $employee->answers!='')?unserialize($employee->answers):[];
    						foreach($form as $question){
    							if($question->type=='slider'){
    								$loo++;
    								$key = array_search($question->id, $q_ar);
    								$is_remarks = isset($remarks[$key])?$remarks[$key]:0;
    								$cur_answer=isset($answers[$question->id])?$answers[$question->id]:0;
    								$cur_score = isset($cur_answer['score'])?$cur_answer['score']:0;
    								$obtained_score = $obtained_score+$cur_score;
    								$cur_remarks = isset($cur_answer['remarks'])?$cur_answer['remarks']:'';
    							?>
    							<tr>
    								<td>
    									<script>

    										$(document).ready(function(){
    											$("#ion-start<?php echo isset($question->id)?$question->id:0;?>").ionRangeSlider({
    												disable: true,
    												step: 0.1,
    												min: 1,
    												max: 5,
    												
    												from: <?php echo $cur_score;?>
    											});
    										});
    									</script>
    									<input type="hidden" name="question_idx[]" value="<?php echo isset($question->id)?$question->id:0;?>">
    									<input type="hidden" name="type_x[]" value="<?php echo isset($question->type)?$question->type:'radio';?>">
    									<input type="hidden" id="slide<?php echo isset($question->id)?$question->id:0;?>" name="slide_<?php echo isset($question->id)?$question->id:0;?>" value="<?php echo $cur_score;?>">
    									<h6 class="m-t-none m-b-none"><?php echo isset($question->title)?$LP.' - '.$question->title:'';?></h6>
    									<?php if(isset($question->desc_en) && $question->desc_en!=''){?>
    									<p class="m-l-md m-b-none"><?php echo $question->desc_en;?></p>
    								<?php }?>
    								<?php if(isset($question->desc_ur) && $question->desc_ur!=''){?>
    									<p class="text-sm urdu-font m-l-md"><?php echo $question->desc_ur;?></p>
    								<?php }?>
    									
    										
    									</td>
    									<td class="b-l b-r" colspan="5">
    										<div id="ion-start<?php echo isset($question->id)?$question->id:0;?>"></div>

    										
    									</td>
    								
    								<td><?php if($is_remarks==1){ ?><?php echo $cur_remarks;?><?php }else{?><?php }?></td>
    							</tr>
    							<?php 
    							}elseif($question->type=='radio'){
    								$loo++;
    								$key = array_search($question->id, $q_ar);
    								$is_remarks = isset($remarks[$key])?$remarks[$key]:0;
    								$cur_answer=isset($answers[$question->id])?$answers[$question->id]:0;
    								$cur_score = isset($cur_answer['score'])?$cur_answer['score']:0;
    								$obtained_score = $obtained_score+$cur_score;
    								$cur_remarks = isset($cur_answer['remarks'])?$cur_answer['remarks']:'';
    								?>
    								<tr>
    									<td>
    										<h6 class="m-t-none m-b-none"><?php echo isset($question->title)?$LP.' - '.$question->title:'';?></h6>
    										<?php if(isset($question->desc_en) && $question->desc_en!=''){?>
    											<p class="m-l-md m-b-none"><?php echo $question->desc_en;?></p>
    										<?php }?>
    										<?php if(isset($question->desc_ur) && $question->desc_ur!=''){?>
    											<p class="text-sm urdu-font m-l-md"><?php echo $question->desc_ur;?></p>
    										<?php }?>
    										
    										
    									</td>
    									<td  style="padding-left: 4px !important;padding-right: 4px !important;" class="b-l"><i class="fa <?php if(isset($cur_score) && $cur_score==1){echo 'fa-circle';}else{echo 'fa-circle-o';}?>"></i></td>
    									<td style="padding-left: 4px !important;padding-right: 4px !important;"><i class="fa <?php if(isset($cur_score) && $cur_score==2){echo 'fa-circle';}else{echo 'fa-circle-o';}?>"></i></td>
    									<td style="padding-left: 4px !important;padding-right: 4px !important;"><i class="fa <?php if(isset($cur_score) && $cur_score==3){echo 'fa-circle';}else{echo 'fa-circle-o';}?>"></i></td>
    									<td style="padding-left: 4px !important;padding-right: 4px !important;"><i class="fa <?php if(isset($cur_score) && $cur_score==4){echo 'fa-circle';}else{echo 'fa-circle-o';}?>"></i></td>
    									<td style="padding-left: 4px !important;padding-right: 4px !important;"><i class="fa <?php if(isset($cur_score) && $cur_score==5){echo 'fa-circle';}else{echo 'fa-circle-o';}?>"></i></td>
    									<td style="padding-left: 4px !important;padding-right: 4px !important;" class="b-l"><?php if($is_remarks==1){ ?><p><?php echo $cur_remarks;?></p><?php }else{?><input type="hidden" name="remarks[]" value=""><?php }?></td>
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

    					<div style="clear: both;" class="clearfix"></div>

    					<div class="m-t-lg text-lg">
    						<div class="col-xs-6">
    							<label class="form-label">Total Marks: </label> <div class="b-b overflow text-md"><?php echo isset($loo)?$loo*5:0;?></div>
    						</div>
    						<div class="col-xs-6">
    							<label class="form-label">Obtained Marks: </label> <div class="b-b overflow text-md"><?php echo isset($obtained_score)?$obtained_score:'';?></div>
    						</div>
    						<div style="clear: both;" class="clearfix m-b-md"></div>
    						<p class="col-xs-12">In which area worker should improve.</p>
    					</div>

    					<div style="clear: both;" class="clearfix"></div>
    					<div class="table-responsive col-xs-12">
    						<table class="table table-hover b">
    							<thead>
    								<tr>
    									<th width="50%">Area of Improvement</th>
    									<th width="50%">Required Training</th>
    									
    								</tr>
    							</thead>
    							<tbody>
    								<tr>
    									<td><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    									<td class="b-l"><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    								</tr>
    								<tr>
    									<td><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    									<td class="b-l"><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    								</tr>
    								<tr>
    									<td><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    									<td class="b-l"><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    								</tr>
    								<tr>
    									<td><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    									<td class="b-l"><label class="form-label">&ordm;</label><div class="overflow"></div></td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    					<div style="clear: both;" class="clearfix"></div>
    					<div class="table-responsive col-xs-12 m-t-lg">
    						<table class="table table-hover b">
    							<thead>
    								<tr>
    									<th class="b-l" >Criteria</th>
    									<th class="b-l" >U (40-50)</th>
    									<th class="b-l" >I (51-60)</th>
    									<th class="b-l" >G (61-70)</th>
    									<th class="b-l" >V (71-85)</th>
    									<th class="b-l" >OS (86-100)</th>
    								</tr>
    								
    							</thead>
    							
    						</table>
    					</div>
<div style="clear: both;" class="clearfix"></div>
    					<div class="m-t-lg text-lg m-t-lg">
    						<div class="col-xs-12 m-b-md">
    							<label class="form-label">Employee Signature/Thumb Impression: </label> <div class="b-b overflow text-md m-t-lg"><?php  isset($employee->first_name)?$employee->first_name:'';?></div>
    						</div>
    						<div class="col-xs-12">
    							<label class="form-label">Supervisor Comments/Signature: </label> <div class="b-b overflow text-md m-t-lg"><?php  isset($employee->first_name)?$employee->first_name:'';?></div>
    						</div>
    						<div class="col-xs-12 b-b" style="margin-top:45px;"></div>
    						<div class="col-xs-12 m-t-lg">
    							<label class="form-label">HOD Comments/Signature: </label> <div class="b-b overflow text-md m-t-lg"><?php  isset($employee->first_name)?$employee->first_name:'';?></div>
    						</div>
    						<div class="col-xs-12 b-b" style="margin-top:45px;"></div>
    						
    						

    					</div>
    				



    					<!-- <div class="clearfix" style="clear: both;"></div>
    					<div class="col-xs-12">
    						<div class="m-t-lg" style="border: 1px solid #cccccc; padding: 15px;min-height: 150px;margin-bottom: 15px;">
    							<span>Remarks:</span>
    						</div>
    					</div> -->
    					<div class="clearfix" style="clear: both;"></div>
    					<div style="margin-top:45px;" class=" text-lg  m-b-lg">
    						<div class="col-xs-12">
    							<label class="form-label">HR Comments/Signature: </label> <div class="b-b overflow text-md m-t-md"></div>
    						</div>

    						<div class="clearfix m-b-lg" style="clear: both;"></div>

    						<!-- <div class="col-xs-6">
    							<label class="form-label">Approved: &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="abc" value="" data-switch-no-init></label> 
    						</div>
    						<div class="col-xs-6">
    							<label class="form-label">Rejected: &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="abc" value="" data-switch-no-init></label> 
    						</div>
    						
    												<div class="clearfix m-b-lg" style="clear: both;"></div> -->

    					</div>
    					



    </div>

</div>









<style>
.factors.table > thead > tr > th, .factors.table > tbody > tr > th, .factors.table > tfoot > tr > th, .factors.table > thead > tr > td, .factors.table > tbody > tr > td, .factors.table > tfoot > tr > td{
	padding-top: 3px;padding-bottom: 3px;
}
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
	var table='';
   $(document).ready(function() {
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