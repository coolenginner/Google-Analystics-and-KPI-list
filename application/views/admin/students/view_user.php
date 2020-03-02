 <?php $this->load->view('admin/includes/head',['body'=>'']);//sidebar-xs

  ?>

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
.form-control[disabled], fieldset[disabled] .form-control{
	cursor: default;
	background-color:#fff;
}
input[type="text"], input[type="password"], input[type="search"], input[type="email"], input[type="number"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="url"], input[type="tel"], textarea, .form-control{
	padding: 0;
	height: auto;
	border: none;border-bottom: 1px solid #ccc;
	cursor: default;;
}
</style>

<div class="panel panel-flat">
    

    <div class="panel-body">
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<div class="thumbnail">
					<div class="thumb thumb-slide">
						<?php 
						$student_image = isset($student->image)?$student->image:'';
						$financial_situation = isset($student->financial_situation)?$student->financial_situation:'';
						$birth_certificate = isset($student->birth_certificate)?$student->birth_certificate:'';
						$guardian_id = isset($student->guardian_id)?$student->guardian_id:'';
						$vaccination = isset($student->vaccination)?$student->vaccination:'';
						

						$student_id = isset($student->id)?$student->id:0;
						
						$file_number = isset($student->file_number)?$student->file_number:'';
						$file_number2 = normalize($file_number);
						
						$dir='./uploads/students/st'.$student_id.'_'.$file_number2.'/';
						$path='uploads/students/st'.$student_id.'_'.$file_number2.'/';
						
						
						if($student_image!='' && file_exists($dir.$student_image)){
						?>
<img src="<?php echo site_url($path.$student_image);?>" alt="">
					<?php }else{?>
						<img src="<?php echo site_url('assets/avatar.gif');?>" alt="">
					<?php }?>
						
						
					</div>

					<div class="caption text-center">
						<h6 class="text-semibold no-margin"><?php 
						$first_name = isset($student->first_name)?$student->first_name:'';
						$last_name = isset($student->last_name)?' '.$student->last_name:'';
						echo $first_name.$last_name;
						?> 
						<small class="display-block"><?php echo isset($student->school_name)?$student->school_name:'';?></small>
					</h6>

					</div>
				</div>
			</div>
<div class="col-md-9 col-sm-7">
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
                <!-- <legend class="text-bold"></legend> -->
                <div class="row">
                	<div class="clearfix"></div>
                	
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">

                			<label class="text-md"><?php echo $this->lang->line("dated_at");?></label>
                			<input disabled required="required" type="text"  name="dated_at" value="<?php echo isset($student->dated_at)?$student->dated_at:'';?>" placeholder="" class="form-control joining">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("file_number");?></label>
                			<input disabled  type="text"  name="file_number" value="<?php echo isset($student->file_number)?html_escape($student->file_number):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="clearfix hidden-sm hidden-md"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("first_name");?></label>
                			<input disabled  required="required" type="text" name="first_name" value="<?php echo isset($student->first_name)?html_escape($student->first_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("last_name");?></label>
                			<input disabled  required="required" type="text"  name="last_name" value="<?php echo isset($student->last_name)?html_escape($student->last_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("dob");?></label>
                			<input disabled  required="required" type="text"  name="dob" value="<?php echo isset($student->dob)?html_escape($student->dob):'';?>" placeholder="" class="form-control joining">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("pob");?></label>
                			<input disabled  type="text"  name="pob" value="<?php echo isset($student->pob)?html_escape($student->pob):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>

                	<div class="col-sm-12">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("address");?></label>
                			<textarea disabled   required="required" name="address" class="form-control"><?php echo isset($student->address)?$student->address:'';?></textarea>
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("section");?></label>
                			<input disabled type="text"  name="section" value="<?php echo isset($student->section)?html_escape($student->section):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("last_institute");?></label>
                			<input disabled type="text"  name="last_institute" value="<?php echo isset($student->last_institute)?html_escape($student->last_institute):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("average_obtained");?></label>
                			<input disabled type="text"  name="avg_obtained" value="<?php echo isset($student->avg_obtained)?html_escape($student->avg_obtained):'';?>" placeholder="" class="form-control">
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class=" col-sm-12">
                		<div class="form-group">
                			<label><?php echo $this->lang->line("other_children");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->other_children) && $student->other_children==0){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("no");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->other_children) && $student->other_children>0){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("yes");?></label>
                			
                		</div>
                	</div>
                	<div class="other_children_box" <?php if(isset($student->other_children) && $student->other_children<1){?>style="display: none"<?php }?>>
                		<div class=" col-sm-4">
                			<div class="form-group">
                				<label><?php echo $this->lang->line("how_much");?></label>
                				<div class="clearfix"></div>
                				<input disabled="disabled"  type="text" name="other_children" value="<?php echo isset($student->other_children)?html_escape($student->other_children):'';?>" placeholder="" class="form-control">

                			</div>
                		</div>
                		<div class=" col-sm-4">
                			<div class="form-group">
                				<label><?php echo $this->lang->line("attended_school_name");?></label>
                				<div class="clearfix"></div>
                				<input disabled="disabled"  type="text" name="attended_school_name" value="<?php echo isset($student->attended_school_name)?html_escape($student->attended_school_name):'';?>" placeholder="" class="form-control">

                			</div>
                		</div>
                	</div>

                	
                	
                	<div class="clearfix"></div>
                	
                	<div class="clearfix"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("father_name");?></label>
                			<input disabled  required="required" type="text"  name="father_name" value="<?php echo isset($student->father_name)?html_escape($student->father_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("father_occupation");?></label>
                			<input disabled type="text"  name="father_occupation" value="<?php echo isset($student->father_occupation)?html_escape($student->father_occupation):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("status");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->father_alive) && $student->father_alive==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("alive");?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->father_alive) && $student->father_alive==0){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("died");?></label>
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("mother_name");?></label>
                			<input disabled  required="required" type="text"  name="mother_name" value="<?php echo isset($student->mother_name)?html_escape($student->mother_name):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("mother_occupation");?></label>
                			<input disabled type="text"  name="mother_occupation" value="<?php echo isset($student->mother_occupation)?html_escape($student->mother_occupation):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("status");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->mother_alive) && $student->mother_alive==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("alive");?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->mother_alive) && $student->mother_alive==0){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("died");?></label>
                		</div>
                	</div>
                	<div class="clearfix"></div>

                	<div class="col-md-12 col-sm-12">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("parental_status");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->parental_status) && $student->parental_status==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("married");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->parental_status) && $student->parental_status==2){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?>  <?php echo $this->lang->line("free_union");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->parental_status) && $student->parental_status==3){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("cohabiting");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->parental_status) && $student->parental_status==4){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("singles");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->parental_status) && $student->parental_status==5){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("divorced");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->parental_status) && $student->parental_status==6){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("tutors");?></label>&nbsp;&nbsp;&nbsp;
                		</div>
                	</div>
                	<div class="clearfix"></div>

                	<div class="col-md-12 col-sm-12">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("child_lives");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->child_lives) && $student->child_lives==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("his_father");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->child_lives) && $student->child_lives==2){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("his_mother");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->child_lives) && $student->child_lives==3){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("the_two");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->child_lives) && $student->child_lives==4){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("other");?></label>&nbsp;&nbsp;&nbsp;
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-6 col-sm-12 child_live_other" <?php if(isset($student->child_lives) && $student->child_lives<4){?>style="display: none;"<?php }?>>
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("child_live_other");?></label>
                			<div class="clearfix"></div>
                			<input type="text" name="child_live_other" value="<?php echo isset($student->child_live_other)?html_escape($student->child_live_other):'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-12 col-sm-12">
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("child_sicky");?></label>
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->child_sicky) && $student->child_sicky==0){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("no");?></label>&nbsp;&nbsp;&nbsp;
                			<label><?php if(isset($student->child_sicky) && $student->child_sicky==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("yes");?></label>
                			
                		</div>
                	</div>
                	<div class="col-sm-12"  <?php if(isset($student->child_sicky) && $student->child_sicky<1){?>style="display: none;"<?php }?> >
                		<div class="form-group">
                			<label class="text-md"><?php echo $this->lang->line("parent_observation");?></label>
                			<textarea disabled   name="parent_observation" class="form-control"><?php echo isset($student->parent_observation)?$student->parent_observation:'';?></textarea>
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->registration_fee) && $student->registration_fee==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("registration_fee");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-3 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->annual_training_fee) && $student->annual_training_fee==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("annual_training_fee");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->livre) && $student->livre==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("livre");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->manger) && $student->manger==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("manger");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="col-md-2 col-sm-4">
                		<div class="form-group">
                			<div class="clearfix"></div>
                			<label><?php if(isset($student->uniformes) && $student->uniformes==1){?><i class="fa fa-check-square"></i><?php }else{?><i class="fa fa-square-o"></i> <?php }?> <?php echo $this->lang->line("uniformes");?></label>&nbsp;
                			
                			
                		</div>
                	</div>
                	<div class="clearfix"></div>

                	<?php if($student_image!=''){?>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-sm"><?php echo $this->lang->line("student_image");?></label>
                			<div class="clearfix"></div>
                			<a href="<?php echo site_url('admin/students/attachment/'.$student_id.'/1');?>"  class=""><?php //echo $this->lang->line('download');?>
                				<img class="img-responsive img-rounded b wrapper-xs" src="<?php echo site_url($path.$student_image); ?>" alt="student_image">
                			</a>
                			
                		</div>
                	</div>
                <?php }?>
                	<?php if($financial_situation!=''){?>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-sm"><?php echo $this->lang->line("financial_situation");?></label>
                			<div class="clearfix"></div>
                			<a href="<?php echo site_url('admin/students/attachment/'.$student_id.'/2');?>"  class="">
                				<img class="img-responsive img-rounded b wrapper-xs" src="<?php echo site_url($path.$financial_situation); ?>" alt="financial_situation">
                				<?php //echo $this->lang->line('download');?></a>
                			
                		</div>
                	</div>
                <?php }?>
                	<?php if($birth_certificate!=''){?>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-sm"><?php echo $this->lang->line("birth_certificate");?></label>
                			<div class="clearfix"></div>
                			<a href="<?php echo site_url('admin/students/attachment/'.$student_id.'/3');?>"  class="">
                				<img class="img-responsive img-rounded b wrapper-xs" src="<?php echo site_url($path.$birth_certificate); ?>" alt="birth_certificate">
                				<?php //echo $this->lang->line('download');?></a>
                			
                		</div>
                	</div>
                <?php }?>
                <div class="clearfix hidden-md hidden-sm"></div>
                	<?php if($guardian_id!=''){?>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-sm"><?php echo $this->lang->line("guardian_id");?></label>
                			<div class="clearfix"></div>
                			<a href="<?php echo site_url('admin/students/attachment/'.$student_id.'/4');?>"  class="">
                				<img class="img-responsive img-rounded b wrapper-xs" src="<?php echo site_url($path.$guardian_id); ?>" alt="guardian_id">
                				<?php //echo $this->lang->line('download');?></a>
                			
                		</div>
                	</div>
                <?php }?>
                	<?php if($vaccination!=''){?>
                	<div class="col-md-4 col-sm-6">
                		<div class="form-group">
                			<label class="text-sm"><?php echo $this->lang->line("vaccination");?></label>
                			<div class="clearfix"></div>
                			<a href="<?php echo site_url('admin/students/attachment/'.$student_id.'/5');?>"  class="">
                				<img class="img-responsive img-rounded b wrapper-xs" src="<?php echo site_url($path.$vaccination); ?>" alt="vaccination">
                				<?php //echo $this->lang->line('download');?></a>
                			
                		</div>
                	</div>
                <?php }?>


                	
                	
          
                	<div class="clearfix"></div>
                	<div class="col-md-12">
                		<a href="<?php echo site_url('admin/students/download_all/'.$student_id);?>"  class="btn btn-primary"><?php echo $this->lang->line('download_all_attachments');?></a>
                	</div>
                	<div class="clearfix"></div>
                	<hr>
                	<div class="col-md-6 col-sm-6">
                		<div class="form-group">

                			<label class="text-md"><?php echo $this->lang->line("signature_child_officer");?></label>
                			<div class="clearfix"></div>
                			<div class="col-sm-3">
                			<?php if(isset($student->signature_child_officer) && $student->signature_child_officer!=''){
                				$signature_child_officer =  $student->signature_child_officer;
                				$signature_child_officer = str_replace('width="996"','width="200"',$signature_child_officer);
                				$signature_child_officer = str_replace('height="315"','height="100"',$signature_child_officer);
                				$signature_child_officer = str_replace('<g ','<g transform="translate(-0 0) scale(0.2 0.2)" ',$signature_child_officer);
                				echo $signature_child_officer;
                			}?>
                		</div>


                			
                		</div>
                	</div>
                	<div class="col-md-6 col-sm-6">
                		<div class="form-group">

                			<label class="text-md"><?php echo $this->lang->line("signature_director");?></label>
                			<div class="clearfix"></div>
                			<div class="col-sm-3">
                			<?php if(isset($student->signature_director) && $student->signature_director!=''){
                				$signature_director =  $student->signature_director;
                				$signature_director = str_replace('width="996"','width="200"',$signature_director);
                				$signature_director = str_replace('height="315"','height="100"',$signature_director);
                				$signature_director = str_replace('<g ','<g transform="translate(-0 0) scale(0.2 0.2)" ',$signature_director);
                				echo $signature_director;
                			}?>
                		</div>


                			
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	
                	 
                </div>
          
               
              

               <div class="clearfix"></div>
            </fieldset>

            <div class="clearfix"></div>
           

            
        </form>

    </div>
</div>
    </div>

</div>



<?php $this->load->view('admin/includes/footer'); ?>
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
	$(document).ready(function(){
		/*child_lives_type();
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
			});*/
	});
</script>
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> -->
