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
            $class = 'col-md-6';
        }
//      /  print_r($customer_info);
        ?>

        <form action="" method="post" enctype="multipart/form-data" id="form-category" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Customer Name</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="firstname"   value="<?php echo isset($customer_info->firstname) ? $customer_info->firstname : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Email</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="email" name="email"   value="<?php echo isset($customer_info->email) ? $customer_info->email : ''; ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Latitude</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="latitude"   value="<?php echo isset($customer_info->latitude) ? $customer_info->latitude : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Longitude</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" name="longitude"   value="<?php echo isset($customer_info->longitude) ? $customer_info->longitude : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Telephone</label>
                            <input  class="form-control" type="text" name="telephone"   value="<?php echo isset($customer_info->telephone) ? $customer_info->telephone : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Facebook Id</label>
                            <input  class="form-control" type="text" name="facebook_id"   value="<?php echo isset($customer_info->facebook_id) ? $customer_info->facebook_id : ''; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Device Type</label>
                            <input  class="form-control" type="text" name="device_type"   value="<?php echo isset($customer_info->device_type) ? $customer_info->device_type : ''; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="">Date Added</label>
                            <input  class="form-control" type="text" name="date_added"   value="<?php echo isset($customer_info->date_added) ? $customer_info->date_added : ''; ?>" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="">Image</label>
                            <div class="">
                                <input type="file"  name="userfile" class="file-input" data-show-preview="false" data-show-upload="false">
                                <input type="hidden"  name="userfile_h" value="<?php echo isset($customer_info->image) ? $customer_info->image : ''; ?>">

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $img_path = '';
                $class = 'hidden';
                $img_name = isset($customer_info->image) ? $customer_info->image : '';
                $fb_avatar_url = isset($customer_info->fb_avatar_url) ? $customer_info->fb_avatar_url : '';
                if ($fb_avatar_url != "") {
                    $img_path = $fb_avatar_url;
                    $class = '';
                } else {
                    $class = 'hidden';
                    $img_path = base_url() . 'assets/images/no_image.png';
                    if (file_exists('./uploads/customer/thumbs/' . $img_name) && $img_name != '') {
                        $class = '';
                        $img_path = base_url() . 'uploads/customer/thumbs/' . $img_name;
                    }
                }
                ?>
                <div class="<?php echo $class; ?> m-b-sm" id="blah">

                    <img width="150" src="<?php echo $img_path; ?>">
                </div>
            </fieldset>

            <div class="clearfix"></div>
            <div class="form-group">
                <label>Status</label>
                <div class="clearfix"></div>
                <input id="switch-state" value="1" name="is_active" type="checkbox" data-size="mini" <?php echo (isset($customer_info->status) && $customer_info->status == 1) ? 'checked' : ''; ?> >
            </div>

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
        $('#form-category input,textarea').attr('readonly', 'readonly');
        $("#form-category select").prop("disabled", true);
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