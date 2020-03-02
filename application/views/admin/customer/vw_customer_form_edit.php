<?php $this->load->view('admin/includes/head'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_select2.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/highlight.js"></script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> Edit Customer</h5>
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
            $class = 'col-md-4 col-sm-6';
        }
//      /  print_r($customer_info);
        ?>

        <form action="" method="post" enctype="multipart/form-data" id="form-category" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">
                    <!-- <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">First Name</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="first_name"   value="<?php //echo isset($customer_info->first_name) ? $customer_info->first_name : ''; ?>">
                        </div>
                    </div> -->
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Name</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="name"   value="<?php echo isset($customer_info->name) ? $customer_info->name : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Email</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="email" name="email"   value="<?php echo isset($customer_info->email) ? $customer_info->email : ''; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Facebook ID</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="fb_id"   value="<?php echo isset($customer_info->fb_id) ? $customer_info->fb_id : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="">Address</label>

                            <textarea required="required" class="form-control" name="address"><?php echo isset($customer_info->address) ? $customer_info->address : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">City</label>
                            <select required="required" class="form-control select2" name="city_id">
								<?php 
								$qry="SELECT id,name FROM cs_cities order by name asc";
								$qry=$this->db->query($qry);
								$results = $qry->result();
								if(count($results)>0){
									foreach($results as $row){
										$selected='';
										if($row->id==$customer_info->city_id){
											$selected='selected';
										}
										echo '<option '.$selected.' value="'.$row->id.'">'.$row->name.'</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                     <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Mobile</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="mobile"   value="<?php echo isset($customer_info->mobile) ? $customer_info->mobile : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Phone</label>
                            <span class="text-danger">*</span>
                            <input  class="form-control" type="text" name="phone"   value="<?php echo isset($customer_info->phone) ? $customer_info->phone : ''; ?>">
                        </div>
                    </div>
                    
                   
                    
                    
                   

                </div>
              
               
            </fieldset>

            <div class="clearfix"></div>
            

            <div class="">
                <?php if (isset($button_update) && $button_update != '') { ?>
                    <button type="submit" id="submit" class="btn btn-primary"><?php echo $button_update; ?></button>
                <?php } ?>
            </div>
        </form>
    </div>

</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script>

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
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
                    form.submit();
                }
            });
        });
    });
</script>