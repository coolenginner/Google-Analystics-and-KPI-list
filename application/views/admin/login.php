<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo site_url('assets/images/favicon.png'); ?>" sizes="32x32">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->


        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <!-- /theme JS files -->

    </head>

    <body>



        <!-- Page container -->
        <div class="page-container login-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content">

                        <!-- Simple login form -->
                        <form id="login" action="" method="post">
                            <div class="panel panel-body login-form">
                            	
                                <div class="text-center">
                                    <div class="">
                                        <!-- <img src="<?php echo base_url(); ?>assets/images/logo_light.jpg" alt="" style=" width: 150px;"> -->

                                    </div>
                                    <h5 class="content-group"><?php echo $this->lang->line("login_account");?> <small class="display-block"><?php echo $this->lang->line("enter_credentials");?></small></h5>
                                </div>
                                <?php if (isset($error) && $error != '') { ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                        </button>
                                        <strong>Attention! </strong><?php echo $error; ?>
                                    </div>
                                <?php } ?>

                                <!-- <div class="form-group has-feedback has-feedback-left">
                                    <input autofocus type="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" name="email" placeholder="<?php echo $this->lang->line("email");?>">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line("password");?>">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <a href="<?php echo site_url('auth');?>" class="  btn btn-danger btn-block"><i class="icon-google-plus"></i> Sign in with Google </a>
                                </div>

                                <div class="text-center">
                                    <!-- <a href="#">Forgot password?</a>-->
                                </div>
                            </div>
                        </form>
                        <!-- /simple login form -->


                        

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

        <script>
            $(document).ready(function () {

                // $.validator.setDefaults({ ignore: ":hidden:not(.w-full)" })
                $('#submit').on('click', function () {
                    $("form#login").validate({
                        errorElement: 'span',
                        errorClass: 'help-block',
                        ignore: ":hidden:not(select)",
                        rules: {
                            email: {
                                required: true,
                            },
                            password: {
                                required: true,
                                //minlength: 8
                            }

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
                        submitHandler: function (form) {
                            form.submit();
                        }
                    });
                });
            });
        </script>

    </body>
</html>
