 <?php $this->load->view('admin/includes/head',['body'=>'']);//sidebar-xs ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_select2.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autoComplete.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
<style>
.uploader .action{
	width: auto;
}
</style>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> <?php echo isset($page_title)?$page_title:'';?></h5>
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
            $class = 'col-md-6';
        }
//      /  print_r($customer_info);
        ?>
        <?php if(isset($errors) && count($errors)>0){?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php foreach($errors as $error){?>
				<p><?php echo $error;?></p>
			<?php }?>
		</div>
	<?php }?>
        <form action="" method="post" enctype="multipart/form-data" id="form-order" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">
                	<div class="clearfix"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("select_school");?></label>
                			<select <?php echo set_select('school_id');?> class="form-control select2"  name="school_id" style="width:100% !important;">
                				<!-- <option disabled="disabled" selected="selected"></option> -->
                				<?php if(isset($schools) && count($schools)>0){
                					$get_school = $this->input->get('school_id')?$this->input->get('school_id'):0;
                					foreach($schools as $emp){
                						$selected='';
                						if($emp->id==$get_school){
                							$selected='selected';
                						}
                						
                						?>
                				<option <?php echo $selected;?> value="<?php echo isset($emp->id)?$emp->id:0;?>"><?php echo isset($emp->name)?$emp->name:'';?></option>
                				<?php }}?>
                				
                	
                			</select>
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("grade");?></label>
                			<select <?php echo set_select('grade');?> class="form-control select2"  name="grade" style="width:100% !important;">
                				<!-- <option disabled="disabled" selected="selected"></option> -->
                				
                				
                				<option value="1">Pre-kindergarten</option>
                				<option value="2">Kindergarten</option>
                				<option value="3">1st Grade</option>
                				<option value="4">2nd Grade</option>
                				<option value="5">3rd Grade</option>
                				<option value="6">4th Grade</option>
                				<option value="7">5th Grade</option>
                				<option value="8">6th Grade</option>
                				<option value="9">7th Grade</option>
                				<option value="10">8th Grade</option>
                				<option value="11">9th Grade</option>
                				<option value="12">10th Grade</option>
                				
                				
                	
                			</select>
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("dated_at");?></label>
                			<input autocomplete="nope" required="required" type="text" value="<?php echo set_value('dated_at');?>" name="dated_at" value="<?php echo isset($question->dated_at)?html_escape($question->dated_at):'';?>" placeholder="" class="form-control joining">
                		</div>
                	</div>
                	<div class="clearfix hidden-sm hidden-md"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("file_number");?></label>
                			<input required="required"  type="text" value="<?php echo set_value('file_number');?>" name="file_number" value="<?php echo isset($question->file_number)?html_escape($question->file_number):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("first_name");?></label>
                			<input  required="required" type="text" value="<?php echo set_value('first_name');?>" name="first_name" value="<?php echo isset($question->first_name)?html_escape($question->first_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("last_name");?></label>
                			<input  required="required" type="text" value="<?php echo set_value('last_name');?>" name="last_name" value="<?php echo isset($question->last_name)?html_escape($question->last_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("dob");?></label>
                			<input autocomplete="nope"  required="required" type="text" value="<?php echo set_value('dob');?>" name="dob" value="<?php echo isset($question->dob)?html_escape($question->dob):'';?>" placeholder="" class="form-control joining">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("pob");?></label>
                			<input  type="text" value="<?php echo set_value('pob');?>" name="pob" value="<?php echo isset($question->pob)?html_escape($question->pob):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>

                	<div class="col-sm-12">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("address");?></label>
                			<textarea   required="required" name="address" class="form-control"><?php echo set_value('address');?></textarea>
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("section");?></label>
                			<input  type="text" value="<?php echo set_value('section');?>" name="section" value="<?php echo isset($question->section)?html_escape($question->section):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("last_institute");?></label>
                			<input  type="text" value="<?php echo set_value('last_institute');?>" name="last_institute" value="<?php echo isset($question->last_institute)?html_escape($question->last_institute):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("average_obtained");?></label>
                			<input  type="text" value="<?php echo set_value('avg_obtained');?>" name="avg_obtained" value="<?php echo isset($question->avg_obtained)?html_escape($question->avg_obtained):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	
                	<div class="clearfix"></div>
                	<div class=" col-sm-4">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("other_children");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" name="other_children2" <?php echo set_radio('other_children2','0');?> value="0"> <?php echo $this->lang->line("no");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="other_children2" <?php echo set_radio('other_children2','1');?> value="1"> <?php echo $this->lang->line("yes");?></label>
                			
                		</div>
                	</div>
                	<div class="other_children_box">
                		<div class=" col-sm-4">
                			<div class="form-group">
                				<label><?php echo $this->lang->line("how_much");?></label>
                				<div class="clearfix"></div>
                				<input  type="text" value="<?php echo set_value('other_children');?>" name="other_children" value="<?php echo isset($question->other_children)?html_escape($question->other_children):'';?>" placeholder="" class="form-control">

                			</div>
                		</div>
                		<div class=" col-sm-4">
                			<div class="form-group">
                				<label><?php echo $this->lang->line("attended_school_name");?></label>
                				<div class="clearfix"></div>
                				<input  type="text" value="<?php echo set_value('attended_school_name');?>" name="attended_school_name" value="<?php echo isset($question->attended_school_name)?html_escape($question->attended_school_name):'';?>" placeholder="" class="form-control">

                			</div>
                		</div>
                	</div>

                	<div class="clearfix"></div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("father_name");?></label>
                			<input  required="required" type="text" value="<?php echo set_value('father_name');?>" name="father_name" value="<?php echo isset($question->father_name)?html_escape($question->father_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("father_occupation");?></label>
                			<input type="text" value="<?php echo set_value('father_occupation');?>" name="father_occupation" value="<?php echo isset($question->father_occupation)?html_escape($question->father_occupation):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("father_phone");?></label>
                			<input type="text" value="<?php echo set_value('father_phone');?>" name="father_phone" value="<?php echo isset($question->father_phone)?html_escape($question->father_phone):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("status");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" name="father_alive" <?php echo set_radio('father_alive','1');?> value="1"> <?php echo $this->lang->line("alive");?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="father_alive" <?php echo set_radio('father_alive','0');?> value="0"> <?php echo $this->lang->line("died");?></label>
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("mother_name");?></label>
                			<input  required="required" type="text" value="<?php echo set_value('mother_name');?>" name="mother_name" value="<?php echo isset($question->mother_name)?html_escape($question->mother_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("mother_occupation");?></label>
                			<input type="text" value="<?php echo set_value('mother_occupation');?>" name="mother_occupation" value="<?php echo isset($question->mother_occupation)?html_escape($question->mother_occupation):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("mother_phone");?></label>
                			<input type="text" value="<?php echo set_value('mother_phone');?>" name="mother_phone" value="<?php echo isset($question->mother_phone)?html_escape($question->mother_phone):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("status");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" name="mother_alive" <?php echo set_radio('mother_alive','1');?> value="1"> <?php echo $this->lang->line("alive");?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="mother_alive" <?php echo set_radio('mother_alive','0');?> value="0"> <?php echo $this->lang->line("died");?></label>
                		</div>
                	</div>
                	<div class="clearfix"></div>

                	<div class="col-md-12 col-sm-12">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("parental_status");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" name="parental_status" <?php echo set_radio('parental_status','1');?> value="1"> <?php echo $this->lang->line("married");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="parental_status" <?php echo set_radio('parental_status','2');?> value="2">  <?php echo $this->lang->line("free_union");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="parental_status" <?php echo set_radio('parental_status','3');?> value="3"> <?php echo $this->lang->line("cohabiting");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="parental_status" <?php echo set_radio('parental_status','4');?> value="4"> <?php echo $this->lang->line("singles");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="parental_status" <?php echo set_radio('parental_status','5');?> value="5"> <?php echo $this->lang->line("divorced");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="parental_status" <?php echo set_radio('parental_status','6');?> value="6"> <?php echo $this->lang->line("tutors");?></label>&nbsp;&nbsp;&nbsp;
                		</div>
                	</div>
                	<div class="clearfix"></div>

                	<div class="col-md-6 col-sm-12">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("child_lives");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" <?php echo set_radio('child_lives','1');?> name="child_lives" value="1"> <?php echo $this->lang->line("his_father");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" <?php echo set_radio('child_lives','2');?> name="child_lives" value="2"> <?php echo $this->lang->line("his_mother");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" <?php echo set_radio('child_lives','3');?> name="child_lives" value="3"> <?php echo $this->lang->line("the_two");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" <?php echo set_radio('child_lives','4');?> name="child_lives" value="4"> <?php echo $this->lang->line("other");?></label>&nbsp;&nbsp;&nbsp;
                		</div>
                	</div>
                	

                	<div class="col-md-6 col-sm-12 child_live_other" style="display: none;">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("child_live_other");?></label>
                			<div class="clearfix"></div>
                			<input type="text" value="<?php echo set_value('child_live_other');?>" name="child_live_other" value="<?php echo isset($question->child_live_other)?html_escape($question->child_live_other):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="clearfix"></div>


                	<div class="col-md-12 col-sm-12">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("child_sicky");?></label>
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init checked="checked" type="radio" name="child_sicky" <?php echo set_radio('child_sicky','0');?> value="0"> <?php echo $this->lang->line("no");?></label>&nbsp;&nbsp;&nbsp;
                			<label><input data-switch-no-init  type="radio" name="child_sicky" <?php echo set_radio('child_sicky','1');?> value="1"> <?php echo $this->lang->line("yes");?></label>
                			
                		</div>
                	</div>
                	<div class="col-sm-12 parent_observation" style="display: none;">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("parent_observation");?></label>
                			<textarea   name="parent_observation" class="form-control"><?php echo set_value('parent_observation');?></textarea>
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init  type="checkbox" <?php echo set_checkbox('registration_fee','1');?> name="registration_fee" value="1"> <?php echo $this->lang->line("registration_fee");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init  type="checkbox" <?php echo set_checkbox('annual_training_fee','1');?> name="annual_training_fee" value="1"> <?php echo $this->lang->line("annual_training_fee");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init  type="checkbox" <?php echo set_checkbox('livre','1');?> name="livre" value="1"> <?php echo $this->lang->line("livre");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init  type="checkbox" <?php echo set_checkbox('manger','1');?> name="manger" value="1"> <?php echo $this->lang->line("manger");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><input data-switch-no-init  type="checkbox" <?php echo set_checkbox('uniformes','1');?> name="uniformes" value="1"> <?php echo $this->lang->line("uniformes");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("student_image");?></label>
                			<input type="file" name="image" class="file-styled">
                			
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("financial_situation");?></label>
                			<input type="file" name="financial_situation" class="file-styled">
                			
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("birth_certificate");?></label>
                			<input type="file" name="birth_certificate" class="file-styled">
                			
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("guardian_id");?></label>
                			<input type="file" name="guardian_id" class="file-styled">
                			
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("vaccination");?></label>
                			<input type="file" name="vaccination" class="file-styled">
                			
                		</div>
                	</div>


                	
                	
                	
                	
<!--                 	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Date of Joining</label>
                			<input  type="text" value="<?php echo set_value('joining');?>" name="joining" value="<?php echo isset($question->joining)?$question->joining:'';?>" data-mask="9999-99-99" placeholder="" class="form-control joining disabled">
                		</div>
                	</div>
 -->                	<!-- <div class="col-sm-4">
                		<div class="form-group">
                			<label>Type</label>
                			<select  class="form-control" name="type">
 <option disabled="disabled" selected="selected">Please Select</option>
 <option value="Internal">Internal</option>
 <option value="External">External</option>
                			</select>
                			<input  type="text" value="<?php echo set_value('joining');?>" name="joining" value="<?php echo isset($question->joining)?$question->joining:'';?>" placeholder="" class="form-control">
                		</div>
                	</div> -->
                	<div class="clearfix"></div>
                	 
                </div>
               
               <!-- <div class="form-group">
               	<label><input type="checkbox" name="">
               </div>
                -->
               
              

               <div class="clearfix"></div>
            </fieldset>

            <div class="clearfix"></div>
           

            <div class="">
                <?php if (isset($button_update) && $button_update != '') { ?>
                    <button type="submit" id="submit-order" class="btn btn-primary"><?php echo $button_update; ?></button>
                <?php } ?>
            </div>
        </form>
    </div>

</div>


<div class="modal fade" id="modal-customer">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add New Customer</h4>
			</div>
			<div class="modal-body">
				<?php $this->load->view('admin/customer/add-customer-part');?>
			</div>
			
		</div>
	</div>
</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script>

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
	function child_lives_type(){
		var child_lives= $('input[name="child_lives"]:checked').val();
		//alert(child_lives);
		if(child_lives==4){
			$('.child_live_other').show();
			$('.child_live_other').find('input').attr('required','required');
		}else{
			$('.child_live_other').find('input').removeAttr('required');
			
			$('.child_live_other').hide();
		}
	}
	function child_sicky_type(){
		var child_sicky= $('input[name="child_sicky"]:checked').val();
		//alert(child_sicky);
		if(child_sicky==1){
			$('.parent_observation').show();
			$('.parent_observation').find('textarea').attr('required','required');
		}else{
			$('.parent_observation').find('textarea').removeAttr('required');
			
			$('.parent_observation').hide();
		}
	}
	function other_children_type(){
		var child_sicky= $('input[name="other_children2"]:checked').val();
		//alert(child_sicky);
		if(child_sicky==1){
			$('.other_children_box').show();
			$('.other_children_box').find('input').attr('required','required');
		}else{
			$('.other_children_box').find('input').removeAttr('required');
			
			$('.other_children_box').hide();
		}
	}
	
	function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 6; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
	$('#password').val(text);
  
}
	var counter=0;
	function load_job_titles(){
		var class_selector = '.job_title';

		var typingTimer = 0;
		var doneTypingInterval = 500;
		var demo = new autoComplete({
			selector: class_selector,
			autoFocus: true,
			minChars: 1,
			cache: 0,
			//delimiter: /(,|;)\s*/,

			source: function (term, suggest) {

				$('.autocomplete-suggestions').html('');
				clearTimeout(typingTimer);
				typingTimer = setTimeout(function () {
					$.getJSON("<?php echo site_url('admin/employees/search_job_title');?>", {
						q: term
					},
					function (data) {
						suggest(data);

					})
				}, doneTypingInterval);


			},
			renderItem: function (item, search) {

				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&amp;');

				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				//var matcher = new RegExp( "\\b" + re, "i" );
				var longname = item[1];



				return '<div class="autocomplete-suggestion"   data-name="' + item['job_title'] + '" ><div class="pull-left">' + item['job_title'] + ' </div></div>';
			},
			onSelect: function (e, term, item) {
				var selector_name = $(this)['selector'];


				$(selector_name+99).val(item.getAttribute('data-id'));
				$(selector_name).val(item.getAttribute('data-name'));
				//$('form').focusout();


			}
		});
	}
	function load_departments(){
		var class_selector = '.department';

		var typingTimer = 0;
		var doneTypingInterval = 500;
		var demo = new autoComplete({
			selector: class_selector,
			autoFocus: true,
			minChars: 1,
			cache: 0,
			//delimiter: /(,|;)\s*/,

			source: function (term, suggest) {

				$('.autocomplete-suggestions').html('');
				clearTimeout(typingTimer);
				typingTimer = setTimeout(function () {
					$.getJSON("<?php echo site_url('admin/employees/search_department');?>", {
						q: term
					},
					function (data) {
						suggest(data);

					})
				}, doneTypingInterval);


			},
			renderItem: function (item, search) {

				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&amp;');

				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				//var matcher = new RegExp( "\\b" + re, "i" );
				var longname = item[1];



				return '<div class="autocomplete-suggestion"   data-name="' + item['department'] + '" ><div class="pull-left">' + item['department'] + ' </div></div>';
			},
			onSelect: function (e, term, item) {
				var selector_name = $(this)['selector'];


				$(selector_name+99).val(item.getAttribute('data-id'));
				$(selector_name).val(item.getAttribute('data-name'));
				//$('form').focusout();


			}
		});
	}
	function load_grades(){
		var class_selector = '.grade';

		var typingTimer = 0;
		var doneTypingInterval = 500;
		var demo = new autoComplete({
			selector: class_selector,
			autoFocus: true,
			minChars: 1,
			cache: 0,
			//delimiter: /(,|;)\s*/,

			source: function (term, suggest) {

				$('.autocomplete-suggestions').html('');
				clearTimeout(typingTimer);
				typingTimer = setTimeout(function () {
					$.getJSON("<?php echo site_url('admin/employees/search_grade');?>", {
						q: term
					},
					function (data) {
						suggest(data);

					})
				}, doneTypingInterval);


			},
			renderItem: function (item, search) {

				search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&amp;');

				var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
				//var matcher = new RegExp( "\\b" + re, "i" );
				var longname = item[1];



				return '<div class="autocomplete-suggestion"   data-name="' + item['grade'] + '" ><div class="pull-left">' + item['grade'] + ' </div></div>';
			},
			onSelect: function (e, term, item) {
				var selector_name = $(this)['selector'];


				$(selector_name+99).val(item.getAttribute('data-id'));
				$(selector_name).val(item.getAttribute('data-name'));
				//$('form').focusout();


			}
		});
	}
function get_customer_history(id){
	if(typeof id=='undefined'){
		return false;
	}
	
	$.ajax({
		url: '<?php echo  site_url('admin/orders/get_customer_history'); ?>',
		type: 'POST',
		dataType: 'json',
		data: {id:id},
		complete: function(xhr, textStatus) {
			//called when complete
		},
		success: function(data, textStatus, xhr) {
			if(data.html){
				$('#customer_details').html(data.html);
				$('#customer_id').val(id);
				$('#customer_id + span').remove();
			}
			/*if(data.dollar_price){
				$(cur_selector).closest('.row-block').find('.link').val(data.product_link);
				$(cur_selector).closest('.row-block').find('.color').val(data.color);
				$(cur_selector).closest('.row-block').find('.size').val(data.size);
				$(cur_selector).closest('.row-block').find('.dollar_price').val(data.dollar_price);
				$(cur_selector).closest('.row-block').find('.sale_price').val(data.sale_price);
			}*/
		},
		error: function(xhr, textStatus, errorThrown) {
			//called when there is an error
		}
	});
}
function load_product_suggest(CTR){
		var class_selector = '.product_name_'+CTR;
	
	var typingTimer = 0;
	var doneTypingInterval = 500;
	var demo = new autoComplete({
		selector: class_selector,
		autoFocus: true,
		minChars: 1,
		cache: 0,
		//delimiter: /(,|;)\s*/,

		source: function (term, suggest) {

			$('.autocomplete-suggestions').html('');
			clearTimeout(typingTimer);
			var obj=$(this)['selector'];
			var merchant_name = $(obj).closest('.row-block').find('.merchant_name').val();
		
			typingTimer = setTimeout(function () {
				//var merchant_name = $().val();
				$.getJSON("<?php echo site_url('admin/orders/search_product');?>", {
					q: term,
					merchant_name:merchant_name
				},
				function (data) {
					suggest(data);

				})
			}, doneTypingInterval);


		},
		renderItem: function (item, search) {

			var Color = item['color'];if(Color==null){Color='-';}
			var Size = item['size'];if(Size==null){Size='-';}
			var dollar_price = item['dollar_price'];
			var sale_price = item['sale_price'];
			
		

			return '<div class="autocomplete-suggestion" data-sale_price="' + item['sale_price'] + '" data-dollar_price="' + item['dollar_price'] + '" data-color="' + item['color'] + '" data-size="' + item['size'] + '" data-id="' + item['id'] + '" data-name="' + item['name'] + '" ><div class="pull-left"><strong>' + item['id'] + '</strong> - ' + item['name'] + ' </div><div class="pull-right">' +Color+ '/'+ Size +' ($'+dollar_price+'/'+sale_price+') </div></div>';
		},
		onSelect: function (e, term, item) {
			var selector_name = $(this)['selector'];
			
			
			$(selector_name+99).val(item.getAttribute('data-id'));
			$(selector_name).val(item.getAttribute('data-name'));
			populate_product(item.getAttribute('data-id'),selector_name);	

		}
	});

}
function populate_product(id,cur_selector){
	if(typeof id=='undefined'){
		return false;
	}
	$.ajax({
			url: '<?php echo  site_url('admin/orders/get_product'); ?>',
			type: 'POST',
			dataType: 'json',
			data: {id:id},
			complete: function(xhr, textStatus) {
				//called when complete
			},
			success: function(data, textStatus, xhr) {
				if(data.dollar_price){
					$(cur_selector).closest('.row-block').find('.link').val(data.product_link);
					$(cur_selector).closest('.row-block').find('.color').val(data.color);
					$(cur_selector).closest('.row-block').find('.size').val(data.size);
					$(cur_selector).closest('.row-block').find('.dollar_price').val(data.dollar_price);
					$(cur_selector).closest('.row-block').find('.per_unit').val(data.sale_price);
				}
				update_totals();
			},
			error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
			}
		});
}
	
	function add_row(repeat){
		if(typeof repeat=='undefined'){
			repeat=0;
		}
		$.ajax({
			url: '<?php echo  site_url('admin/orders/add_row'); ?>',
			type: 'POST',
			dataType: 'json',
			data: {counter:counter},
			complete: function(xhr, textStatus) {
				//called when complete
			},
			success: function(data, textStatus, xhr) {
				if(data.html){
					
					$('#order_items').append(data.html);
					
					var cur_counter = counter;
					
						
						load_merchant_suggest(cur_counter);	
						load_product_suggest(cur_counter);
						update_serial();
						counter++;
						if(repeat>0){
							var new_repeat = parseInt(repeat)-1;
							add_row(new_repeat);
						}
					
				}
			},
			error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
			}
		});
		
	}
	$(document).on('click','.delete_row',function(){
		$(this).closest('.row-block').remove();
		update_serial();
	});
	$(document).on('click','.add_row',function(){
		
		add_row();
	});
	function update_totals(){
		var total_quantity=0;
		var total_dollars=0;
		var total_price=0;
		$.each($('#order_items .quantity'),function(){
			var Quan = $(this).val();
			if(Quan!=''){
				var per_unit = $(this).closest('.row-block').find('.per_unit').val();
				var row_total = parseInt(Quan)*parseFloat(per_unit);
				
				$(this).closest('.row-block').find('.sale_price').val(parseFloat(row_total).toFixed(2));
				total_quantity = parseFloat(total_quantity)+parseFloat(Quan);
			}
		});
		$.each($('#order_items .dollar_price'),function(){
			var DP = $(this).val();
			if(DP!=''){
				total_dollars = parseFloat(total_dollars)+parseFloat(DP);
			}
		});
		$.each($('#order_items .sale_price'),function(){
			var TP = $(this).val();
			if(TP!=''){
				total_price = parseFloat(total_price)+parseFloat(TP);	
			}
			
		});
		$('.total_quan').text(total_quantity);
		$('.dollars_total').text(total_dollars);
		$('.price_total').text(total_price);
	}
	function update_serial(){
		var seri=1;
		$.each($('#order_items .row-number'),function(){
			$(this).text(seri+' - ');
			seri++;
		});
		if($('#order_items .row-number').length>0){
			$('.row-total').show();
		}else{
			$('.row-total').hide();
		}
		update_totals();
	}
	$(document).on('change blur',".quantity,.dollar_price,.sale_price,.per_unit",function(){
		update_totals();
	})
		$(document).ready(function() {
			child_lives_type();
			child_sicky_type();
			other_children_type();
			$('input[name="child_lives"]').on('change',function(){
				
				child_lives_type();
			});
			$('input[name="child_sicky"]').on('change',function(){
				
				child_sicky_type();
			});
			$('input[name="other_children2"]').on('change',function(){
				
				other_children_type();
			});
			$(".file-styled").uniform({
				fileButtonClass: 'action btn btn-default',
				//fileButtonHtml: "Choisir le fichier",
				//fileDefaultHtml: "Aucun fichier sélectionné",
			});

			load_job_titles();
			load_departments();
			load_grades();
			$('.joining').datepicker({
				maxDate: "+0D",
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				//numberOfMonths: 3,
				//showButtonPanel: true
				

				onClose: function (dateText, inst) {
					console.log(dateText);
					console.log(inst);
					$('.joining').trigger('blur');

				}

			});
			$('.select2').select2({
				placeholder: "Select Form",
				allowClear: true
			});
			//add_row(1);
			
    		/*$('form').on('keypress',function(event){//"*:not(input)"
    			if(event.keyCode == 13) {
    				event.preventDefault();
    				return false;
    			}
    		});*/


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
                    //form.submit();
                    $.ajax({
                      url: '<?php echo  site_url('admin/customers/add_ajax'); ?>',
                      type: 'POST',
                      dataType: 'json',
                      data: $('#form-category').serialize(),
                      complete: function(xhr, textStatus) {
                        //called when complete
                      },
                      success: function(data, textStatus, xhr) {
                        if(data.error){

                        	return false;
                        }else{
                        	$('#customer_id').val(data.id);
                        	$('#search_customer').val(data.string);
                        	get_customer_history(data.id);
                        	$('#modal-customer').modal('hide');
                        }
                      },
                      error: function(xhr, textStatus, errorThrown) {
                        //called when there is an error
                      }
                    });
                    
                    
                }
            });
        });

    	$('.select2').select2();
    	var typingTimer = 0;
    	var doneTypingInterval = 500;
    	var demo = new autoComplete({
        selector: '#search_customer',
        autoFocus: true,
        minChars: 1,
        cache: 0,
        //delimiter: /(,|;)\s*/,

        source: function (term, suggest) {
            
                $('.autocomplete-suggestions').html('');
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function () {
                	$.getJSON("<?php echo site_url('admin/orders/search_customer');?>", {
                		q: term
                	},
                	function (data) {
                		suggest(data);

                	})
                }, doneTypingInterval);
            

        },
        renderItem: function (item, search) {
        
            search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&amp;');

            var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
            //var matcher = new RegExp( "\\b" + re, "i" );
            var longname = item[1];
            


            return '<div class="autocomplete-suggestion" data-email="' + item['email'] + '" data-id="' + item['id'] + '" data-name="' + item['name'] + '" data-mobile="' + item['mobile'] + '"><div class="pull-left"><strong>' + item['id'] + '</strong> - ' + item['name'] + ' ('+item['email']+') </div><div class="pull-right ">' + item['mobile'] +'</div></div>';
        },
        onSelect: function (e, term, item) {
        	var display_name = item.getAttribute('data-id')+' - '+item.getAttribute('data-name')+' '+item.getAttribute('data-last_name')+' ('+ item.getAttribute('data-email')+')';
        	var customer_id = parseInt(item.getAttribute('data-id'));
        	//alert(customer_id);
        	$('#customer_id').val(customer_id);
            //document.getElementById('search_customer').value = display_name;
            document.getElementById('search_customer').value = '';
            get_customer_history(item.getAttribute('data-id'));	
            //$('form').focusout();		
            //$('#autocomplete').attr('value', item.getAttribute('data-langname'));

            //refresh_search(0,1);
            //console.log(item);
            //change_exchange(item.getAttribute('data-langname'),1);
            //window.location = 'https://www.stocktargetadvisor.com/search_securities/?symbolstring=' + item.getAttribute('data-langname')+'&ss=1';
            //window.location = 'https://www.stocktargetadvisor.com/stock_details/?symbolstring=' + item.getAttribute('data-langname');
        }
    });
    	function get_customer_details(id){
    		if(typeof id=='undefined'){
    			return false;
    		}
    		$.ajax({
    			url: '<?php echo  site_url('admin/orders/get_customer_details'); ?>',
    			type: 'POST',
    			dataType: 'json',
    			data: {id:id},
    			complete: function(xhr, textStatus) {
    				//called when complete
    			},
    			success: function(data, textStatus, xhr) {
    				if(data.dollar_price){
    					$(cur_selector).closest('.row-block').find('.link').val(data.product_link);
    					$(cur_selector).closest('.row-block').find('.color').val(data.color);
    					$(cur_selector).closest('.row-block').find('.size').val(data.size);
    					$(cur_selector).closest('.row-block').find('.dollar_price').val(data.dollar_price);
    					$(cur_selector).closest('.row-block').find('.sale_price').val(data.sale_price);
    				}
    			},
    			error: function(xhr, textStatus, errorThrown) {
    				//called when there is an error
    			}
    		});
    	}
    	$('#search_customer').on('change',function(){
    		//if($(this).val().length==0)
    		{
    			$('#customer_id').val('');
    			$('#customer_details').html('');
    		}
    	});	
    	$(document).on('keypress',function (e) {
    		if (e.which == 13) {
    			$('#submit-order').trigger('click');
    		}
    	});
        $('#submit-order').on('click', function () {
        	
            $("form#form-order").validate({
                errorElement: 'span',
                errorClass: 'help-block',
                successClass: 'validation-valid-label',
                //ignore: ":hidden:not(select)",
                ignore: [],
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
                    }else if (element.parent().hasClass('.custom-error-display')) {
                        error.appendTo(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                messages: {
					'customer_id': {
						//required: "You must check at least 1 box",
						required: "Please select customer or add new customer.",
						//maxlength: "Check no more than {0} boxes",
						//minlength: "You must check at least {0} boxes"
					}
				},
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });



       
    });

</script>