<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo APP_NAME;?></title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>

        <style>
            .datatable-footer {
                padding-top: 20px;
                padding-left: 20px;
                padding-right: 20px;
            }
            /* .sidebar {
                  background-color: #923d30;
            } */
            .navigation > li.active > a, .navigation > li.active > a:hover, .navigation > li.active > a:focus {
                background-color: #f75b69;
            }
            .header-highlight .navbar-header:not([class*=bg-]) {
               /*background-color: #ffffff;*/
               box-shadow: none;
            }

            /* .btn-primary {
                color: #fff;
                background-color: #923d30;
                border-color: #923d30;
            } */
            /* .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
                z-index: 3;
                color: #fff;
                background-color: #f26666;
                border-color: #f26666;
                cursor: default;
            }
            .btn-primary:active:hover, .btn-primary.active:hover, .open > .dropdown-toggle.btn-primary:hover, .btn-primary:active:focus, .btn-primary.active:focus, .open > .dropdown-toggle.btn-primary:focus, .btn-primary:active.focus, .btn-primary.active.focus, .open > .dropdown-toggle.btn-primary.focus {
                background-color: #f26666;
                border-color: #f26666;
            } */
            .navbar-brand > img {
            	margin-top: -10px;
            	height: auto;
            	width: 120px;

            	margin-left: 55px;
            }
        </style>
        <!-- /theme JS files -->

    </head>

    <body class="<?php echo isset($body)?$body:'';?>">

        <!-- Main navbar -->
        <div class="navbar navbar-default header-highlight">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                	<!-- <img src="<?php echo base_url(); ?>assets/images/logo_light.jpg?v=1" alt=""> -->
                	<?php echo APP_NAME;?>
                </a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>


                </ul>


                <ul class="nav navbar-nav navbar-right">

                    <?php
                    $user_data_shop_h = $this->session->userdata('shoppalatt_shop');
                    $shop_id_h = isset($user_data_shop_h['shop_id']) ? $user_data_shop_h['shop_id'] : 0;
                    $admin_uri = $this->uri->segment(1);
                    $c_name = 'admin';
                    if ($shop_id_h > 0 && $admin_uri == 'shop') {
                        $c_name = 'shop';
                    }
                    ?>
                    <li><a href="<?php echo site_url('logout') ; ?>"><i class="icon-switch2"></i> Logout</a></li>


                </ul>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <?php  $this->load->view('includes/sidebar'); ?>
                <!-- /main sidebar -->


                <!-- Main content -->
                <div class="content-wrapper">
                    <div class="page-header hidden">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h4>
                            </div>

                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <div class="pull-right">

                                        <?php if (isset($add_link) && $add_link != '') { ?>
                                            <a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
                                        <?php } ?>
                                        <?php if (isset($add_link_rest_link) && $add_link_rest_link != '') { ?>
                                            <a href="#" class="btn btn-sm btn-primary pull-right" style="    font-size: 13px;"  data-toggle="modal" data-target="#modal_form_vertical" data-backdrop="static" data-keyboard="false">Reset Password</a>
                                        <?php } ?>
                                        <?php if (isset($add_link_rest_pass) && $add_link_rest_pass != '') { ?>
                                            <a href="#" class="btn btn-sm btn-primarypull-right"  style="font-size: 13px;    margin-right: 10px;    border-right: 2px solid #ccc;    padding-right: 10px;">Reset Password Link To Shop</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                        <!--  <div class="breadcrumb-line">
                              <ul class="breadcrumb">
                                  <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                  <li><a href="datatable_basic.html">Datatables</a></li>
                                  <li class="active">Basic</li>
                              </ul>

                              <ul class="breadcrumb-elements">
                                  <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="icon-gear position-left"></i>
                                          Settings
                                          <span class="caret"></span>
                                      </a>

                                      <ul class="dropdown-menu dropdown-menu-right">
                                          <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                          <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                          <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                      </ul>
                                  </li>
                              </ul>
                              <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div> -->
                    </div>
                    <!-- Content area -->
                    <div class="content m-t-md">
                        <?php if (isset($success) && $success != "") { ?>
                            <div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $success; ?></div>
                        <?php } ?>

                        <?php if (isset($error) && $error != "") { ?>
                            <div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $error; ?></div>
                        <?php } ?>

                            
                        <div hidden id="user_warning" class="alert alert-danger">
                          <button type="button" id="user_warning_c" class="close"  aria-hidden="true">&times;
                          </button>
                          <p id="user_warn_paragraph"></p>
                      </div>

                      <div hidden id="user_succ_alert" class="alert alert-success">
                          <button type="button" id="user_succ_alert_c" class="close"  aria-hidden="true">&times;
                          </button>
                          <p id="user_succ_paragraph"></p>
                      </div>