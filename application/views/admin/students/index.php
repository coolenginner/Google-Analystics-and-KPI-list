<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Packages | Dealer</title>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>assets/assets/dist/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switch.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/dist/plugins/select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/extensions/scroller.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.checkboxes.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
        
        
        <style>
        .dataTables_info,.dataTables_paginate{
        	margin-top: 30px;
        }
        .bg-danger-300{
        	background-color: #FFE7E7 !important;
        	border-color: #FFE7E7 !important;;
        	color:#333;
        }
       /*  #DataTables_Table_1_filter{
       		position: absolute;
       		z-index: 999;
       		top: -80px;
       		left: 300px;
       	}
       @media(max-width:1200px){
       	#DataTables_Table_1_filter{
       		position: absolute;
       		z-index: 999;
       		top: -80px;
       		left: 170px;
       	}
       }
       @media(max-width:1000px){
       	#DataTables_Table_1_filter{
       		position: relative;
       		z-index: 999;
       		top: 0;
       		left: 0;
       	}
       } */
         ::-webkit-scrollbar {
        	-webkit-appearance: none;
        	width: 7px;
        	height: 7px;
        }
        ::-webkit-scrollbar-thumb {
        	border-radius: 4px;
        	background-color: rgba(0,0,0,.5);
        	-webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
        }
        .thumb-img{
        	max-width: 100px;max-height: 40px;;
        }
        h4 .form-group, .h4 .form-group{
        	font-size: 12px;
        }
        .bg-danger-300{
        	background-color: #F6B5B5;
        	border-color: #F6B5B5;
        }
        /* .DTFC_ScrollWrapper,.dataTables_scrollBody{
        	margin-bottom: 15px;
        } */
        #last_image img{
        	display: block;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
        	color: #000;
        }
            /* .datatable-footer {
                padding-top: 20px;
                padding-left: 20px;
                padding-right: 20px;
            } */
            .sidebar {
                background-color: #f26666;
            }
            .navigation > li.active > a, .navigation > li.active > a:hover, .navigation > li.active > a:focus {
            }
            .header-highlight .navbar-header:not([class*=bg-]) {
            }
            .btn-primary {
                color: #fff;
            }
            .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
                z-index: 3;
                color: #fff;
                cursor: default;
            }
            .btn-primary:active:hover, .btn-primary.active:hover, .open > .dropdown-toggle.btn-primary:hover, .btn-primary:active:focus, .btn-primary.active:focus, .open > .dropdown-toggle.btn-primary:focus, .btn-primary:active.focus, .btn-primary.active.focus, .open > .dropdown-toggle.btn-primary.focus {
                background-color: #f26666;
                border-color: #f26666;
            }
            /*.navbar-brand > img {
                margin-top: -19px;
                height: auto;
                width: 190px;
                /* text-align: center; 
                margin-left: 50px;
            }*/
            table,
            table th,
            table td {
            	-webkit-box-sizing: content-box;
            	-moz-box-sizing: content-box;
            	box-sizing: content-box;
            }
            .DTFC_LeftBodyLiner{
            	overflow-x:hidden !important;
            }
              .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
            	padding: 3px 5px;
            }
             .table > thead > tr > th {
            	padding: 5px;
            
            }
            .panel > .content{
            	padding: 10px 20px 20x;
            }
           /* .navbar-brand > img {
                margin-top: -19px;
                height: 60px !important;
                width: auto !important;
                /* text-align: center; 
                margin-left: 50px;
            }*/
.page-header{
	padding-bottom: 9px;
}
.bg-grey-300 {
  background-color: #f1f1f1;
  border-color: #f1f1f1;
  color: #555;
}

#modal-master .modal-dialog {
  width: 95%;
  height: 95%;
  margin: 2.5%;
  padding: 0;
}

#modal-master .modal-content {
  height: auto;
  min-height: 95%;
  border-radius: 0;
}
#modal-master .modal-header{
	cursor: move;
}
.unit_table, .per_unit_table {
    position: absolute;
    right: -15px;
    z-index: 9999;
    width: 300px;
    border: 1px solid #ccc;
    padding: 0px 10px;
    background: #fff;
    display: none;
    padding-bottom: 10px;
    margin-bottom: 10px;
}
 tfoot {
    display: table-header-group; 
}
        </style>
        <!-- /theme JS files -->
    </head>
    <body class="sidebar-xs">
        <!-- Main navbar -->
        <div class="navbar navbar-default">
            <?php
            $show_details  = $this->input->get('show_details')?$this->input->get('show_details'):0;
            $discontinued  = $this->input->get('discontinued')?$this->input->get('discontinued'):0;


            $dealer_data = $this->session->userdata('tire_mvp_dealer');
           
            $id_dealer = isset($dealer_data['dealer_id'])?$dealer_data['dealer_id']:0;
            $dealer_parent = isset($dealer_data['dealer_parent'])?$dealer_data['dealer_parent']:0;
            if($dealer_parent>0){
            	$id_dealer = $dealer_parent;
            }
            $qry = $this->db->query("select logo from mv_dealer where dealer_id = $id_dealer limit 1");

            $logo = $qry->row();
            $logo = isset($logo->logo) ? $logo->logo : '';
            $imgpath = base_url() . 'assets/images/logo_mvp.jpg';
            if (file_exists('./uploads/logo/' . $logo) && $logo != '') {
                $imgpath = base_url() . 'uploads/logo/' . $logo;
            }
            ?>
            <div class="navbar-header" style="padding:10px 0;">
                <a class="navbar-brand" href="#"><img src="<?php echo $imgpath; ?>" alt=""></a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url() ?>dealer/login/logout"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main sidebar -->
                <?php $this->load->view('includes/sidebar_dealer'); ?>
                <!-- /main sidebar -->
                <!-- Main content -->
                <div class="content-wrapper">
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title" style="margin-bottom: 0;padding-bottom: 0">
                                <h4 class="m-b-md"><span class="text-semibold"><?php echo isset($page_title) ? $page_title : 'Packages'; ?> 
                                	<a href="<?php echo site_url('dealer/package_editor/add_new');?>" id="add_brand_button" data-section="tire"   class="btn btn-primary btn-xs btn-rounded">Add New</a>
                                	
                                        <a href="<?php //echo site_url('dealer/package_editor/add_new');?>" data-toggle="modal" data-target="#reset_tires_all"   class="btn btn-primary btn-xs btn-rounded">Apply TP All</a>
                                	<div class="pull-right form-group">
<?php $show_details = $this->input->get('show_details')?$this->input->get('show_details'):0;?>
                                <?php $discontinued = $this->input->get('discontinued')?$this->input->get('discontinued'):0;?>
                                <?php 
$cur_method = $this->router->fetch_method();
if($cur_method=='index'){

}
                                ?>
                                <div class="">
                                    <?php
                                    $qery_admin = $this->db->query("SELECT is_master_link FROM `mv_dealer` WHERE `dealer_id`=$dealer_ID");
                                    $default_dealer = $qery_admin->row();
                                    $is_master_link= isset($default_dealer->is_master_link) ? $default_dealer->is_master_link : 0;
                                    if($is_master_link==1){
                                    ?>
                                	
                                    <a data-toggle="modal" data-target="#modal-master" class="btn btn-sm btn-rounded btn-primary" href="javascript:;<?php //echo site_url('dealer/package_editor');?>">Library</a>
                                    <?php }?>
                                </div>
                                 <div class="btn-group hidden">
                                	<a class="btn btn-sm btn-rounded  btn-default" href="<?php echo site_url('dealer/package_editor/admin_packages');?>">Master</a>
                                	<a class="btn btn-sm btn-rounded btn-primary" href="<?php echo site_url('dealer/package_editor');?>">Dealer</a>
                                </span>
                                	<!-- <span class="" style="">
                                		<label>
                                			<input data-size="mini" class="switch" <?php if($show_details==1){echo 'checked';}?> type="checkbox" value="1" id="show_details">Show edit tire details
                                		</label>
                                	</span>&nbsp;&nbsp; -->
                                	<!-- <span class="" >
                                		<label>
                                			<input data-size="mini" class="switch" <?php if($discontinued==1){echo 'checked';}?> type="checkbox" value="1" id="discontinued">Show only packages with  discontinued wheels
                                		</label>
                                	</span> -->
                                	</div>
                                </h4>
<div class="clearfix m-b-md"></div>
                                	
                            </div>

                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <div class="pull-right">
                                        <?php if (isset($add_link) && $add_link != '') { ?>
                                            <a href="<?php echo site_url($add_link); ?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo $add_title; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                    </div>
                    <!-- Content area -->
                    <div class="panel panel-flat">
                    <div class="content">
                    	<div id="MSG"></div>
                        <?php if (isset($success) && $success != "") { ?>
                            <div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $success; ?></div>
                        <?php } ?>
                        <?php if (isset($error) && $error != "") { ?>
                            <div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $error; ?></div>
                        <?php } ?>

<div class="brand_list" >
                        <table class="table datatable-basic22">
                            
                                <thead>
                                     <tr class="filters">
                                       <th class="searchAble"></th>
                                        <th class="searchAble"></th>
                                        <th class="searchAble"></th>
                                        <th class="searchAble"></th>
                                        <th class="searchAble"></th>
                                        <th class="searchAble"></th>
                                        <th class="searchAble"> </th>
                                        <th class="searchAble"> </th>
                                        <th class="searchAble"> </th>
                                        <th class="searchAble"> </th>
                                        <th class="searchAble"> </th>
                                        <th class="searchAble"> </th>
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <th class="searchAble">Action</th>
                                        <th class="searchAble">Make</th>
                                        <th class="searchAble">Model</th>
                                        <th class="searchAble">Year</th>
                                        <th class="searchAble">Trim</th>
                                        <th class="searchAble">TPMS</th>
                                        <th class="searchAble">Run Flat</th>
                                        <th class="searchAble">Vehicle Type</th>
                                        <th class="searchAble">Tire Size</th>
                                        <th class="searchAble">Alternate Size</th>
                                        <th class="searchAble">Available Rims</th>
                                        <th class="searchAble">Last Update</th>
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    $tire_id_arr='';
                                    if (isset($packages) && count($packages) > 0) {
                                       $tire_id_arr='';
                                        foreach ($packages as $key => $value) {
                                           $live = isset($value->live)?$value->live:0;
                                           $is_tire_available = isset($value->is_tire_available)?$value->is_tire_available:0;
                                            $background='';
                                            /*if(isset($value->admin_package_id) && $value->admin_package_id>0){
                                            	//$background='bg-grey-300';
                                            }*/

                                             if($value->total>0){
                                            	$background='bg-danger-300';
                                            }
                                            $year=isset($value->year) ? $value->year : '';
                                             if(isset($value->year_chk3) && $value->year_chk3==1){
                                                  $year=isset($value->year_chk1) ? $value->year_chk1.'+' : '';      
                                              }
                                              $tire_id_arr.=isset($value->tire_id)?$value->tire_id.',':0;
                                            ?>
                                            <tr data-total="<?php echo $value->total;?>" class="<?php echo $background;?> ">
                                            	<td class="" >
                                                	<?php 
                                                	if($live!=1){
                                                	?>
                                                    <a  href="<?php echo site_url('dealer/package_editor/edit/?id='.$value->tire_id);?>" class="edit_btn" ><i class="fa fa-edit fa-2x"></i></a>
                                                    <?php }?>
                                                    <a data-id="<?php echo $value->tire_id;?>" href="javascript:;" class="text-danger delete_row" data-original-title="Edit"><i class="fa fa-trash  fa-2x"></i></a>
                                                    <?php
                                                    if($is_tire_available==0)
                                                    {
                                                    ?>
                                                    <a  href="javascript:;" class="text-danger tire_not" id="tire_not_<?php echo isset($value->tire_id)?$value->tire_id:0;?>"  data-toggle="tooltip" data-placement="top" title="No tires found in the package or wheels price missing.!"><i class="fa fa-exclamation-triangle  fa-2x"></i></a>
                                                  <?php }?>
                                                     
                                                </td>

                                                <td><?php echo isset($value->make) ? $value->make : '' ?></td>
                                                <td><?php echo isset($value->model) ? $value->model : '' ?></td>
                                                <td><?php echo $year//isset($value->year) ? $value->year : '' ?></td>
                                                <td><?php echo isset($value->trim) ? $value->trim : '' ?></td>
                                                <td><?php 
                                                if($value->tpms==1){
                                                	$tpms_type='';
                                                	if(isset($value->tpms_type) && $value->tpms_type==2){
                                                		$tpms_type=' (Direct)';
                                                	}elseif(isset($value->tpms_type) && $value->tpms_type==3){
                                                		$tpms_type=' (Indirect)';
                                                	}
                                                	echo 'Yes'.$tpms_type;
                                                }else{
                                                	echo 'No';
                                                }
                                                 ?></td>
                                                  <td><?php 
                                                if($value->run_flat==1){
                                                	echo 'Yes';
                                                }else{
                                                	echo 'No';
                                                }
                                                 ?></td>
                                                 <td><?php echo isset($value->tire_grouping_name) ? $value->tire_grouping_name : '' ?></td>
                                                 <td><?php echo isset($value->tire_size) ? $value->tire_size : '' ?></td>
                                                 <td><?php echo isset($value->alternate_size) ? $value->alternate_size : '' ?></td>
                                                  <td class="dis_q_price text-primary" style="    text-align: center;">
                                                    <?php
                                                    $query="SELECT  DISTINCT(P.wheel_identifier)  FROM mv_wheels W 
                                                        left join mv_dealer_package_order P on P.wheel_identifier = W.wheel_identifier
                                                        where W.is_delete=0  and P.package_id='".$value->tire_id."' order by P.id asc";
                                                    $qry=$this->db->query($query);
                                                    $results = $qry->result();
                                                  echo $counut= count($results);
                                                    ?>
                                                    <div data-row_id="0" class="unit_table text-left">
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>Part Number</th>            
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if(count($results)>0){
                                                                foreach($results as $row){
                                                                ?>
                                                                <tr>
                                                                   <td><?php echo isset($row->wheel_identifier)?$row->wheel_identifier:'';?></td>
                                                                </tr>
                                                                <?php }}?>

                                                            </tbody>
                                                        </table>
                                                     </div>
                                                </td>
                                                 <td><?php echo isset($value->last_update) ? $value->last_update : '' ?></td>

                                              <?php /*   <td><button data-id="<?php echo isset($value->tire_id)?$value->tire_id:0;?>" data-toggle="modal" data-target="#reset_tires" type="button" class="reset_tires btn btn-primary btn-sm">Reset Tires</button></td> */?>
                                                 <td><button data-id="<?php echo isset($value->tire_id)?$value->tire_id:0;?>" data-toggle="modal" data-target="#reset_tires" type="button" class="reset_tires btn btn-primary btn-sm">Apply TP</button></td>            
                                                
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="3">No record found</td>

                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
                                
                                 <input type="hidden" id="tire_data" value="<?php echo rtrim($tire_id_arr,',');?>">
                            </table>
                        </div>
                       



                        </div>



<div class="modal fade" id="reset_tires">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<!--<h4 class="modal-title">Reset Tires</h4>-->
				<h4 class="modal-title">Apply Tire Preferences</h4>
			</div>
			<div class="modal-body">
				<!--Are you sure you want to reset tires as tire preferences-->
                                Please confirm that you want to reset tires and tire order as per your current tire preferences
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="reset_tires_btn" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="reset_tires_all">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<!--<h4 class="modal-title">Reset Tires</h4>-->
				<h4 class="modal-title">Apply TP All</h4>
			</div>
			<div class="modal-body">
				<!--Are you sure you want to reset tires as tire preferences-->
                               Please confirm that you want to reset tires and tire order for ALL packages as per your current tire preferences
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="reset_tires_btn_all" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
        
<div class="modal fade" id="modal-master">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<!--<h4 class="modal-title">Master Packages <a href="#<?php //echo site_url('admin/package_editor/add_new');?>" id="copy_to_dealer" data-section="tire"   class="btn btn-primary btn-xs btn-rounded">Copy to Dealer</a></h4>-->
				<h4 class="modal-title">Package Library <a href="#<?php //echo site_url('admin/package_editor/add_new');?>" id="copy_to_dealer" data-section="tire"   class="btn btn-primary btn-xs btn-rounded">Save</a></h4>
			</div>
			<div class="modal-body">
				
			</div>
			
		</div>
	</div>
</div>                

                        
                        

                        

                        <div class="modal fade" id="modal-delete">
                        	<div class="modal-dialog">
                        		<div class="modal-content">
                        			<div class="modal-header">
                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        				<h4 class="modal-title">Delete</h4>
                        			</div>
                        			<div class="modal-body">
                        				Are you sure you want to delete this?
                        			</div>
                        			<div class="modal-footer">
                        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        				<button type="button" class="btn btn-primary sure_delete">Yes</button>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                      
<div class="modal fade" id="modal-id-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">

				<form class="modal_form_update" method="post" enctype="multipart/form-data">

					<input type="hidden" id="hidden_image" name="hidden_image" value="" >
					<input type="hidden" id="hidden_id" name="id" value="" >
					<div class="form-group">
						<label>Name</label>
						<input required="required" type="text" name="name" class="form-control" value="">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input  type="file" name="image" >
						<div class="clearfix"></div>
						<div id="last_image" style="width:200px;">
						</div>
					</div>
					<div class="form-group">
						<label>Manufacturer Type</label>
						<div class="clearfix"></div>
						<label> <input id="type_1" checked="checked" type="radio" name="manufacturer_type"  value="1"> Tire</label>&nbsp;&nbsp;
						<label> <input id="type_2" type="radio" name="manufacturer_type"  value="2"> Wheel</label>
					</div>
					<div class="form-group">
						<label>Permissions</label>
						<div class="clearfix"></div>
						<div id="dealers_list">

						</div>
						
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary update_form_btn">Save</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>







<div class="modal fade" id="modal-add-tire">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Tire</h4>
			</div>
			<div class="modal-body">
				
				<form method="" class="add_tire_form" >
							<div class="row">
								<div class="col-sm-6">
									
									<div class="form-group">
										<label>Brands</label>
										<select class="form-control" name="brand_id">
<?php if(isset($brands) && count($brands)>0){

	foreach($brands as $row){
		echo '<option value="'.$row->id.'">'.$row->brand_name.'</option>';

	}

}?>
										</select>
									</div>

									<div class="form-group">
										<label>Part #</label>
										<input type="text" required="required" name="part_number" value="" class="form-control">
									</div>

									<div class="form-group">
										<label>Tire Size</label>
										<input type="text" required="required" name="tire_size" value="" class="form-control">
									</div>


									<div class="form-group">
										<label>Tire Size Raw</label>
										<input type="text" required="required" name="tire_size_raw" value="" class="form-control">
									</div>

									<div class="form-group">
										<label>Rim Range</label>
										<input type="text" required="required" name="rim_range" value="" class="form-control">
									</div>
									<div class="form-group">
										<label>Load Rating</label>
										<input type="text" required="required" name="load_rating" value="" class="form-control">
									</div>
									
								</div>

								<div class="col-sm-6">
									
									
									

									<div class="form-group">
										<label>Speed Rating</label>
										<input type="text" required="required" name="speed_rating" value="" class="form-control">
									</div>
									<div class="form-group">
										<label>Ship Weight</label>
										<input type="text" required="required" name="ship_weight" value="" class="form-control">
									</div>
									<div class="form-group">
										<label>Max RPM</label>
										<input type="text" required="required" name="max_rpm" value="" class="form-control">
									</div>
									<div class="form-group">
										<label>Trend Depth</label>
										<input type="text" required="required" name="trend_depth" value="" class="form-control">
									</div>
									<div class="form-group">
										<label>Max Load Single</label>
										<input type="text" required="required" name="max_load_single" value="" class="form-control">
									</div>
									
								</div>
							</div>
							<div class="form-group">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" id="save_new_tire" class="btn btn-primary">Save</button>
									</div>
					
				</form>
			</div>
			
		</div>
	</div>
</div>

<div id="load_modals">

</div>



<div class="modal fade" id="modal-image">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<!-- <h4 class="modal-title">Image</h4> -->
			</div>
			<div class="modal-body text-center">
				
			</div>
			
		</div>
	</div>
</div>







                        <!-- Footer -->
                        <div class="footer text-muted">
                            Copyright © 2017 <a href="#">QQuote</a>
                        </div>
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    // $("#newTable").on("click", "td", function() {
   $(document).on('dblclick','.dis_q_price',function(){
     var tbl = $(this).find('.unit_table');
        tbl.show();
   });
     $(document).on('click','body',function(e){
        $('.unit_table').hide();        
    });
     $(document).on('click','.edit_btn',function(){
      var search_input_val=  $('.search_input').val();
        if (search_input_val != 'null' && search_input_val != 'undefined' && search_input_val !='' && search_input_val !== null){
         localStorage.setItem('search_input_val', search_input_val);   
      } 
         
    });
	var modal_shown=0;
	$(document).on('click','#copy_to_dealer',function(e){
				e.preventDefault();
				$('.appended').remove();
				var form = $('#frm-example');

				var rows_selected = table2.column(0).checkboxes.selected();
				var rows_selected2 = table2.column(1).checkboxes.selected();
			

				

				// Iterate over all selected checkboxes
				var counter=0;
				$.each($('.copy-active:checked'), function(index, rowId){
					
					$('#frm-example').append('<input type="hidden" name="idx[]" class="appended" value="'+$(this).val()+'">');
					// Create a hidden element
					/*$(form).append(
						$('<input>')
						.attr('type', 'hidden')
						.attr('class', 'appended')
						.attr('name', 'idx[]')
						.val(rowId)
						);*/
					counter++;
				});
				$.each($('.live-active:checked'), function(index, rowId){
					
					$('#frm-example').append('<input type="hidden" name="idx2[]" class="appended" value="'+$(this).val()+'">');
					// Create a hidden element
					/*$(form).append(
						$('<input>')
						.attr('type', 'hidden')
						.attr('class', 'appended')
						.attr('name', 'idx[]')
						.val(rowId)
						);*/
					counter++;
				});
				if(counter==0){
					//alert('Plese select atleast one package');
					//return false;
				}
				
				//console.log(form);
				$('#MSG').html('');
				//$('show-loader').show();

				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>dealer/package_editor/copy_to_dealer",
					data: new FormData($('#frm-example')[0]),
					cache: false,
					contentType: false,
					processData: false,
					dataType: 'json',


					success: function (data) {
						//$('show-loader').hide();
                                             if(data.data==0){
                                                $('#MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success! </strong> '+data.msg+' </div>');
                                                }
						if(data.data==2){
							$('#MSG').html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Warning! </strong> '+data.not_find+' </div>');
							
							 }
							 if(data.data==1){
							$('#MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success! </strong> '+data.msg+' </div>');
							
							 }
							 $('#modal-master').modal('hide');
							 setTimeout(function(){
										location.reload(); 
									},1500);

							 

					},
					error: function (result) {
						//alert('error');
					}
				});

				modal_shown=0;
			});

	$(document).on('click','.thumb-img-detail',function(){
		
		$('#modal-image .modal-body').html('');
		var img_src = $(this).attr('src');
		$('#modal-image .modal-body').html('<img src="'+img_src+'" />');
		$('#modal-image').modal('show');
	});
	var table='';
	var table2='';
	var this_Obj = '';
	function check_state(State){
		var URl = '<?php echo site_url("dealer/package_editor/index")?>';
				
		//if($('#show_details').is(':checked')){
		if(State==true){
			URl += '?show_details=1';
			$('#add_tire_button,.brand_details_list').show();
			
			$('#add_brand_button,.brand_list').hide();
			$('.brand_details_list').css('visibility','visible');
			$('.brand_list').css('visibility','hidden');
			

		}else{
			$('.brand_details_list').css('visibility','hidden');
			$('.brand_list').css('visibility','visible');
			
			$('#add_tire_button,.brand_details_list').hide();
			$('#add_brand_button,.brand_list').show();
			
		
			

		}
		//history.pushState(null, null, URl);
	}
	var url_add = '';
	//if (window.location.search.indexOf('discontinued') > -1) {
	<?php if($discontinued==1){?>
		url_add = '&discontinued=1';
	<?php }else{?>
		url_add = '&discontinued=0';
	<?php }?>
	$('#show_details').on('change.bootstrapSwitch', function(e) {

		if(e.target.checked==true){
			window.location.href = '<?php echo site_url('dealer/package_editor/index');?>' + "?show_details=1"+url_add;
		}else{
			window.location.href = '<?php echo site_url('dealer/package_editor/index');?>' + "?show_details=0"+url_add;
		}
		//check_state(e.target.checked);
	});
	var url_add2 = '';
	<?php if($show_details==1){?>
		url_add2 = '&show_details=1';
	<?php }else{?>
		url_add2 = '&show_details=0';
	<?php }?>
	$('#discontinued').on('change.bootstrapSwitch', function(e) {
		if(e.target.checked==true){
			window.location.href = '<?php echo site_url('dealer/package_editor/index');?>' + "?discontinued=1"+url_add2;
			
		}else{
			window.location.href = '<?php echo site_url('dealer/package_editor/index');?>' + "?discontinued=0"+url_add2;
		}
	});
	$(document).on('change',"#show_details",function(){
				check_state();


		});
	$(document).on('click',".brand-name",function(e){
				e.preventDefault();
				var brand_Name = $(this).text();
				window.localStorage.setItem('search', brand_Name);
				//check_state(true);
				$('#show_details').bootstrapSwitch('toggleState', true, true);
				//table2.search(brand_Name).draw();
				//$('#DataTables_Table_1_filter input[type="search"]').val(brand_Name);


		});
	$(document).on('click','[data-target="#modal-master"]',function(){
		$('#modal-master .modal-dialog').removeAttr('style');
	});
	$(document).on('click','.reset_tires',function(){
		var Tire_ID = $(this).attr('data-id');
		$('#reset_tires').attr('data-id',Tire_ID);
	});
        $(document).on('click','#reset_tires_btn_all',function(){
            var Tire_ID = $('#tire_data').val();
           $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/reset_tire_preferences_all",
				dataType: 'json',
				data: {tire_id:Tire_ID},
				success: function (data) {
                                    // $('#tire_not_'+Tire_ID).hide();
					if(data.data==2){
						$('#MSG').html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Warning! </strong> '+data.not_find+' </div>');

					}
					if(data.data==1){
						$('#MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success! </strong> '+data.msg+' </div>');

					}
					$('#reset_tires_all').modal('hide');
				},
				error: function (result) {
					////alert('error');
				}
			});
        });
	$(document).on('click','#reset_tires_btn',function(){
		var Tire_ID = $('#reset_tires').attr('data-id');
                
		$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/reset_tire_preferences",
				dataType: 'json',
				data: {tire_id:Tire_ID},
				success: function (data) {
                                     $('#tire_not_'+Tire_ID).hide();
					if(data.data==2){
						$('#MSG').html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Warning! </strong> '+data.not_find+' </div>');

					}
					if(data.data==1){
						$('#MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success! </strong> '+data.msg+' </div>');

					}
					$('#reset_tires').modal('hide');
				},
				error: function (result) {
					////alert('error');
				}
			});	
		
	});
	$(document).ready(function(){
		$.ajaxSetup({
			beforeSend: function (xhr)
			{
				$('#show-loader').show();
			},
			complete: function (xhr)
			{
				$('#show-loader').hide();
			}
		});

		/*$('#modal-master .modal-content').resizable({
			//alsoResize: ".modal-dialog",
			minHeight: 300,
			minWidth: '100%'
		});*/
		$('#modal-master .modal-dialog').draggable();
		$("#modal-master").on("shown.bs.modal", function () { 
			
			if(modal_shown==0){
			$('#modal-master .modal-body').html('');

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/get_admin_packages",
				dataType: 'json',
				data: {},
				success: function (data) {
					if(data.data==1 && data.html){
						$('#modal-master .modal-body').html(data.html);
						//$('.permissions').select2();
                                                var lp=0;
                                                // $('.datatable-basic22 tfoot th').each( function () {
                                                     $('.datatable-admin-packages  thead tr.filters th').each( function (index,el) {
                                                   // var title = $('.datatable-basic22 thead th').eq( $(this).index() ).text();
                                                    var title = 'Search';
                                                    if(lp==0 || lp==1){
                                                    $(this).html( '' );
                                                    }else{

                                                         $(this).html( '<input type="text" style=" width: 85px;" placeholder=" '+title+'" />' );
                                                      }
                                                    lp++;

                                                } );
                                                
						table2 = $('.datatable-admin-packages').DataTable({
							"scrollX": true,
							'columnDefs': [
							{
								render: function ( data, type, row ) {

									if ( type === 'display' ) {
										return '<input value="'+data+'" type="checkbox" class="copy-active">';
									}
									return data;
								},
								'targets': [0],
								
								/*'checkboxes': {
									'selectRow': true
								},*/
								"width":"50px"
							

							},{
								render: function ( data, type, row ) {
									/*console.log(data);
									console.log(type);
									console.log(row);*/
									if ( type === 'display' ) {
										return '<input value="'+data+'" type="checkbox" class="live-active">';
									}
									return data;
								},
								'targets': [1],
								
								/*'checkboxes': {
									'selectRow': true
								},*/
								"width":"50px"
							

							},
                                                        /*{ "searchable": false, "targets": 12 }*/
							],
							
							/*'select': {
								'style': 'os'
							},*/
							"order": [],
							//pageLength: 5,
							"bPaginate": false,
							"lengthChange": false,
							"scrollY": "350px",
							createdRow: function (row, data, index) {

							},
							"rowCallback": function( row, data, index ) {
								var data_live = $(row).attr('data-live');
								if(data_live>0){
									$('input.live-active', row).prop( 'checked', true );
								}
								/*
								if(data_live>0){
									$(row).find('td:nth-child(2) input[type="checkbox"]').prop('checked',true);
								}*/
								
							},
							
						});
                                                  $('#DataTables_Table_1_filter input').addClass('search_input_lab'); // <-- add this line
                                                 
                                                  var search_input_val_lab=  localStorage.getItem('search_input_val_lab');
                                                  
                                                  if(search_input_val_lab != 'null' && search_input_val_lab !== null && search_input_val_lab != 'undefined' && search_input_val_lab !=''){
                                                        table2.search(search_input_val_lab).draw();
                                                        localStorage.setItem('search_input_val_lab', '');
                                                   }
                                                  
                                                   $('.search_input_lab').on( 'keyup', function () {
                                                        //table.search( this.value ).draw();
                                                        localStorage.setItem('search_input_val_lab', this.value);

                                                   } );
                                                     $('.datatable-admin-packages thead tr.filters input').on( 'keyup change', function () {
                                                            table2
                                                                .column( $(this).parent().index()+':visible' )
                                                                .search( this.value )
                                                                .draw();
                                                        } );
                                                   
                                                   /*setTimeout(function(){ 
                                                   $('.datatable-admin-packages thead tr.filters th').each( function (index,el) {

                                                        var title = $(this).text();
                                                        if(lp==0 || lp==1 || lp==12 || lp==13){
                                                                $(this).html( '' );
                                                        }else{
                                                                $(this).html( '<input id="search-col-'+index+'" name="col-'+index+'" data-counter="'+index+'" style="width:100px;" type="text" placeholder="Search" />' );
                                                        }




                                                        lp++;
                                                } );
                                                }, 3000);
                                                   var lp=0;*/
                                                

					}
					//$('#modal-master .dataTables_scrollHead table thead tr th:nth-child(1)').append(' Copy');
					//$('#modal-master .dataTables_scrollHead table thead tr th:nth-child(2)').append(' Live');
					modal_shown=1;
				},
				error: function (result) {
					//alert('error');
				}
			});	
			}		
		});

		$(".switch").bootstrapSwitch();
		
		<?php if (isset($packages) && count($packages) > 0) {?>

                 var lp=0;
                        // $('.datatable-basic22 tfoot th').each( function () {
                             $('.datatable-basic22  thead tr.filters th').each( function (index,el) {
                           // var title = $('.datatable-basic22 thead th').eq( $(this).index() ).text();
                            var title = 'Search';
                            if(lp==0 || lp==12){
                            $(this).html( '' );
                            }else{

                                 $(this).html( '<input type="text" style=" width: 85px;" placeholder=" '+title+'" />' );
                              }
                            lp++;

                        } );
                
			table = $('.datatable-basic22').DataTable({
				 //"order": [[ 0, "desc" ]],
				 "order": [],
                                /* "columnDefs": [
                                    { "searchable": false, "targets": 10 }
                                  ],*/
				 pageLength: 20,
				 "lengthChange": false,
                                 scrollY:        '60vh',
				scrollCollapse: true,

				/*fixedColumns:   {
					leftColumns: 3,

				},*/
				"scrollX": true,
                                
				 createdRow: function (row, data, index) {
				 	//
				 	// if the second column cell is blank apply special formatting
				 	//
				 	//console.dir(row);
				 	//console.dir(data);
				 	/*if (data[1] == "") {
				 		console.dir(row);
				 		$('tr', row).addClass('label-warning');
				 	}*/
				 }
			});
			/*table.on( 'search.dt', function (e,settings) {
				//console.log($('#DataTables_Table_0_filter input').val());
				//var search_val =$('#DataTables_Table_0_filter input').val();
				//table.columns( '.searchAble' ).search( search_val ).draw();
				console.log(e);
				console.log(settings);
				//$('#filterInfo').html( 'Currently applied global search: '+table.search() );
			} );*/
                        $('#DataTables_Table_0_filter input').addClass('search_input'); // <-- add this line
                        var search_input_val2=  localStorage.getItem('search_input_val');
                         if (sessionStorage.getItem("Page2Visited")) {
                                sessionStorage.removeItem("Page2Visited");
                                 var search_input_val = localStorage.getItem('search_input_val');
                                 if (search_input_val != 'null' && search_input_val != 'undefined' && search_input_val !='' && search_input_val !== null ){
                                        table.search(search_input_val).draw();
                                        localStorage.setItem('search_input_val', '');
                                  }
                          } else if(search_input_val2 != 'null' && search_input_val2 != 'undefined' && search_input_val2 !='' && search_input_val2 !== null){
                               table.search(search_input_val2).draw();
                               localStorage.setItem('search_input_val', '');
                          }
                           
                           $('.search_input').on( 'keyup', function () {
                                //table.search( this.value ).draw();
                                localStorage.setItem('search_input_val', this.value);
                                 
                           } );
                          // $(".datatable-basic22 tfoot input").on( 'keyup change', function () {
                            $('.datatable-basic22  thead tr.filters input').on( 'keyup change', function () {
                                table
                                    .column( $(this).parent().index()+':visible' )
                                    .search( this.value )
                                    .draw();
                            } );


			<?php }?>
			var global_loop=0;
			
			

			/*$('#DataTables_Table_1_filter input').on( 'change', function () {
				
			});*/
/*			$('.datatable-basic-details tbody').on( 'click', 'tr', function () {
				$('.datatable-basic-details tbody tr').removeClass('selected');
				$(this).addClass('selected');


				if ( $(this).hasClass('selected') ) {

				}
				else {

				}
			} )*/;
			

		$(document).on('click',"[data-target='#modal-id']",function(){
			var data_section = $(this).data('section');
			$('.modal_form input[type="radio"]').removeAttr('checked');
			if(data_section=='wheel'){
				$('.modal_form input[type="radio"][value="2"]').prop('checked',true);
			}else{
				$('.modal_form input[type="radio"][value="1"]').prop('checked',true);
			}
		});
		$(document).on('click','.edit_data',function(){
			this_Obj = $(this);
			var container_id = $(this).closest('.row').attr('id');
			
			var last_image = $(this).find('img').attr('src');
			var data_image = $(this).attr('data-image');
			var id = $(this).attr('data-id');
			var name = $(this).attr('data-name');
			var m_type = $(this).attr('data-type');
			$('#hidden_id').val(id);
			$('#hidden_image').val(data_image);
			$('#last_image').html('<img src="'+last_image+'">');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>admin/manufacturer/get_manufacturer_permissions",
				dataType: 'json',
				data: {id:id},
			
				success: function (data) {
					if(data.data==1 && data.html){
						$('#dealers_list').html(data.html);
						$('.permissions').select2();
						

					}
					$('#modal-id-edit input[name="name"]').val(name);
					$('#modal-id-edit input[type="radio"]').removeAttr('checked');	
					if(m_type==1){
						
						$('#modal-id-edit #type_1').prop('checked',true);	
					}else{

						$('#modal-id-edit #type_2').prop('checked',true);	
					}
					

					$('#modal-id-edit').modal('show');

					


				},
				error: function (result) {
					//alert('error');
				}
			});

		});
		$('.permissions').select2();
		$(document).on('click','.sure_delete',function(){
			$('#MSG').html('');

			var delete_id = $(this).attr('data-del');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/delete",
				dataType: 'json',
				data: {id:delete_id},
			
				success: function (data) {


					$('#modal-delete').modal('hide');
					$('#modal-id-edit').modal('hide');

					if(data.data==1){
						$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Package has been deleted successfully.</div>');
						window.location.reload();
						
					}else{
						$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Something went wrong.</div>');

					}
					


				},
				error: function (result) {
					//alert('error');
				}
			});			
		});
		$(".delete_row").click(function (e) {
			e.preventDefault();
			this_Obj = $(this);
			$('.sure_delete').attr('data-del',$(this).attr('data-id'));
			
			$('#modal-delete').modal('show');


		});
		$(".add_form_btn").click(function (e) {

			$(".modal_form").validate({
				errorElement: 'span',
				errorClass: 'help-block',
				successClass: 'validation-valid-label',
				// ignore: ":hidden:not(select)",
				ignore: [],
				rules: {
					'packopt[]': {
						required: true,
						//maxlength: 4,
						minlength: 1
					},
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
					else if (element.parents('div').hasClass('iCheck-radio') || element.parents('div').hasClass('radio')) {
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
					//a
					else if (element.attr("name") == "packopt[]") {
						error.appendTo($('#errorbox'));
					}

					// Input group, styled file input
					else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
						error.appendTo(element.parent().parent());
					} else {
						error.insertAfter(element);
					}
				},
				messages: {
					'packopt[]': {
						//required: "You must check at least 1 box",
						required: "Please select at least one option",
						//maxlength: "Check no more than {0} boxes",
						minlength: "You must check at least {0} boxes"
					}
				},
				submitHandler: function (form) {

					e.preventDefault();
					$('#MSG').html('');
					var m_type = $('.modal_form input[type="radio"]:checked').val();
					var m_name = $('.modal_form input[name="name"]').val();
					
						
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>dealer/package_editor/add_tire_brand",
							dataType: 'json',
							data: new FormData($('.modal_form')[0]),
							cache: false,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$('.add_form_btn').addClass('disabled').html('<i class="fa fa-gear fa-spin"></i> Save');
							},
							success: function (data) {
								$('.add_form_btn').removeClass('disabled').html('Save');
								if(data.data==3){
									$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+data.msg+'. </div>');

								}else if(data.data==2){
									$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Upload not performed because of duplicate part numbers.  Please check the following part numbers:  '+data.parts+'. </div>');
								}else if(data.data==1){
									
									$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> New tire brand has been added successfully. </div>');
									setTimeout(function(){
										location.reload(); 
									},1500);
									$('.modal_form')[0].reset();
								}
								$('#modal-id').modal('hide');
								
								

							},
							error: function (result) {
								$('.add_form_btn').removeClass('disabled').html('Save');
								//alert('error');
							}
						});
					}
				});






});
		$(".update_form_btn").click(function (e) {
			
			$(".modal_form_update").validate({
				errorElement: 'span',
				errorClass: 'help-block',
				successClass: 'validation-valid-label',
				// ignore: ":hidden:not(select)",
				ignore: [],
				rules: {
					'packopt[]': {
						required: true,
						//maxlength: 4,
						minlength: 1
					},
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
					else if (element.parents('div').hasClass('iCheck-radio') || element.parents('div').hasClass('radio')) {
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
					//a
					else if (element.attr("name") == "packopt[]") {
						error.appendTo($('#errorbox'));
					}

					// Input group, styled file input
					else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
						error.appendTo(element.parent().parent());
					} else {
						error.insertAfter(element);
					}
				},
				messages: {
					'packopt[]': {
						//required: "You must check at least 1 box",
						required: "Please select at least one option",
						//maxlength: "Check no more than {0} boxes",
						minlength: "You must check at least {0} boxes"
					}
				},
				submitHandler: function (form) {

					e.preventDefault();
					$('#MSG').html('');
						
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>admin/manufacturer/update_manufacturer",
							dataType: 'json',
							data: new FormData($('.modal_form_update')[0]),
							cache: false,
							contentType: false,
							processData: false,
							beforeSend: function(){
								
							},
							success: function (data) {
								if(data.data==1){
									
									$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Record has been  successfully updated. </div>');
									console.log(this_Obj.parent());
									this_Obj.parent().html('<a class="edit_data" data-type="'+data.manufacturer_type+'" data-id="'+data.id+'" data-name="'+data.name+'" data-image="'+data.logo_name+'"  href="javascript:;" style="max-height: 250px;">	<img style="display: block;width:100%;" src="'+data.image+'">	</a>');
								}
								$('#modal-id-edit').modal('hide');
								$('.modal_form_update')[0].reset();
								

							},
							error: function (result) {
								//alert('error');
							}
						});
					}
				});






});

		$("#save_new_tire").click(function (e) {

			$(".add_tire_form").validate({
				errorElement: 'span',
				errorClass: 'help-block',
				successClass: 'validation-valid-label',
				// ignore: ":hidden:not(select)",
				ignore: [],
				rules: {
					'packopt[]': {
						required: true,
						//maxlength: 4,
						minlength: 1
					},
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
					else if (element.parents('div').hasClass('iCheck-radio') || element.parents('div').hasClass('radio')) {
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
					//a
					else if (element.attr("name") == "packopt[]") {
						error.appendTo($('#errorbox'));
					}

					// Input group, styled file input
					else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
						error.appendTo(element.parent().parent());
					} else {
						error.insertAfter(element);
					}
				},
				messages: {
					'packopt[]': {
						//required: "You must check at least 1 box",
						required: "Please select at least one option",
						//maxlength: "Check no more than {0} boxes",
						minlength: "You must check at least {0} boxes"
					}
				},
				submitHandler: function (form) {

					e.preventDefault();
					$('#MSG').html('');
					var m_type = $('.modal_form input[type="radio"]:checked').val();
					var m_name = $('.modal_form input[name="name"]').val();
					
						
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>dealer/package_editor/add_new_tire",
							dataType: 'json',
							data: new FormData($('.add_tire_form')[0]),
							cache: false,
							contentType: false,
							processData: false,
							beforeSend: function(){
								
							},
							success: function (data) {
								 if(data.data==2){
									
									$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Part number already exists. </div>');
									
									
								}else if(data.data==1){
									
									$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> New record added successfully. </div>');
									setTimeout(function(){
										location.reload(); 
									},1500);
									$('.add_tire_form')[0].reset();	
								}
								$('#modal-add-tire').modal('hide');
								
								
								

							},
							error: function (result) {
								//alert('error');
							}
						});
					}
				});






});
});






$(document).on('click','.edit_data_list',function(){
	
	var brand_id = $(this).attr('data-id');

	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>dealer/package_editor/get_brand_form",
		dataType: 'json',
		data: {id:brand_id},

		success: function (data) {
			
			$('#load_modals').html(data.data);
			$('#modal-edit-brand').modal('show');

		},
		error: function (result) {
			//alert('error');
		}
	});

});
$(document).on('click',".save_edit_brand",function (e) {
	//e.preventDefault();
	//alert('here');
	$(".update_brand_form").validate({
		errorElement: 'span',
		errorClass: 'help-block',
		successClass: 'validation-valid-label',
		// ignore: ":hidden:not(select)",
		ignore: [],
		rules: {
			'packopt[]': {
				required: true,
				//maxlength: 4,
				minlength: 1
			},
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
			else if (element.parents('div').hasClass('iCheck-radio') || element.parents('div').hasClass('radio')) {
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
			//a
			else if (element.attr("name") == "packopt[]") {
				error.appendTo($('#errorbox'));
			}

			// Input group, styled file input
			else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				error.appendTo(element.parent().parent());
			} else {
				error.insertAfter(element);
			}
		},
		messages: {
			'packopt[]': {
				//required: "You must check at least 1 box",
				required: "Please select at least one option",
				//maxlength: "Check no more than {0} boxes",
				minlength: "You must check at least {0} boxes"
			}
		},
		submitHandler: function (form) {

			e.preventDefault();
			$('#MSG').html('');
			


			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/update_brand_form",
				dataType: 'json',
				data: new FormData($('.update_brand_form')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function(){
					$('.save_edit_brand').addClass('disabled').html('<i class="fa fa-gear fa-spin"></i> Save');
				},
				success: function (data) {
					$('.save_edit_brand').removeClass('disabled').html('Save');
					if(data.data==3){
									$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+data.msg+' </div>');

								}else if(data.data==2){
							$('#MSG').html('<div class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Upload not performed because of duplicate part numbers.  Please check the following part numbers:  '+data.parts+'. </div>');
					}else if(data.data==1){

						$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> Brand has been updated successfully. </div>');
						setTimeout(function(){
							//location.reload(); 
							 window.location.href = window.location.href;
						},1500);

					}
					$('#modal-edit-brand').modal('hide');
					


				},
				error: function (result) {
					$('.save_edit_brand').removeClass('disabled').html('Save');
					//alert('error');
				}
			});
		}
	});


});

// Edit Tire Details Start
$(document).on('click','.edit_data_details',function(){
	
	var tire_id = $(this).attr('data-id');

	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>dealer/package_editor/get_tire_form",
		dataType: 'json',
		data: {tire_id:tire_id},

		success: function (data) {
			
			$('#load_modals').html(data.data);
			$('#modal-edit-tire').modal('show');

		},
		error: function (result) {
			//alert('error');
		}
	});

});



$(document).on('click',"#save_edit_tire",function (e) {
	//e.preventDefault();
	//alert('here');
	$(".update_tire_form").validate({
		errorElement: 'span',
		errorClass: 'help-block',
		successClass: 'validation-valid-label',
		// ignore: ":hidden:not(select)",
		ignore: [],
		rules: {
			'packopt[]': {
				required: true,
				//maxlength: 4,
				minlength: 1
			},
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
			else if (element.parents('div').hasClass('iCheck-radio') || element.parents('div').hasClass('radio')) {
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
			//a
			else if (element.attr("name") == "packopt[]") {
				error.appendTo($('#errorbox'));
			}

			// Input group, styled file input
			else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				error.appendTo(element.parent().parent());
			} else {
				error.insertAfter(element);
			}
		},
		messages: {
			'packopt[]': {
				//required: "You must check at least 1 box",
				required: "Please select at least one option",
				//maxlength: "Check no more than {0} boxes",
				minlength: "You must check at least {0} boxes"
			}
		},
		submitHandler: function (form) {

			e.preventDefault();
			$('#MSG').html('');
			


			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dealer/package_editor/update_tire_form",
				dataType: 'json',
				data: new FormData($('.update_tire_form')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function(){

				},
				success: function (data) {
					if(data.data>0){

						$('#MSG').html('<div class="Metronic-alerts alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> New manufacturer added successfully. </div>');
						setTimeout(function(){
							//location.reload(); 
							 window.location.href = window.location.href + "?show_details=1";
						},1500);

					}
					$('#modal-edit-tire').modal('hide');
					


				},
				error: function (result) {
					//alert('error');
				}
			});
		}
	});


});

// Edit Tire Details End


</script>
<script>
$(document).ready(function(){
    $('.tire_not').tooltip(); 
});
</script>
    </body>
</html>