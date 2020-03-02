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

        <form action="" method="post" enctype="multipart/form-data" id="form-order" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Participant ID</label>
                			<input required="required" type="text" name="employee_id" value="<?php echo isset($question->employee_id)?$question->employee_id:'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Full Name</label>
                			<input required="required" type="text" name="first_name" value="<?php echo isset($question->first_name)?$question->first_name:'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<!-- <div class="col-sm-4">
                		<div class="form-group">
                			<label>Last Name</label>
                			<input required="required" type="text" name="last_name" value="<?php echo isset($question->last_name)?$question->last_name:'';?>" placeholder="" class="form-control">
                		</div>
                	</div> -->
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Email</label>
                			<input required="required" type="email" name="email" value="<?php echo isset($question->email)?$question->email:'';?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Password <small><a onclick="makeid();" href="javascript:;">Generate Password</a></small></label>
                			<input id="password" required="required" type="text" name="password" value="<?php echo random_password();?>" placeholder="" class="form-control">
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Job Title</label>
                			<input required="required" type="text" name="job_title" value="<?php echo isset($question->job_title)?$question->job_title:'';?>" placeholder="" class="job_title form-control">
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Department</label>
                			<input required="required" type="text" name="department" value="<?php echo isset($question->department)?$question->department:'';?>" placeholder="" class="form-control department">
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Grade</label>
                			<input required="required" type="text" name="grade" value="<?php echo isset($question->grade)?$question->grade:'';?>" placeholder="" class="form-control grade">
                		</div>
                	</div>
                	
                	
                	
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Date of Joining</label>
                			<input required="required" type="text" name="joining" value="<?php echo isset($question->joining)?$question->joining:'';?>" data-mask="9999-99-99" placeholder="" class="form-control joining disabled">
                		</div>
                	</div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Type</label>
                			<select required="required" class="form-control" name="type">
<option disabled="disabled" selected="selected">Please Select</option>
<option value="Internal">Internal</option>
<option value="External">External</option>
                			</select>
                			<!-- <input required="required" type="text" name="joining" value="<?php echo isset($question->joining)?$question->joining:'';?>" placeholder="" class="form-control"> -->
                		</div>
                	</div>
                	<div class="clearfix"></div>
                	<div class="col-sm-4">
                		<div class="form-group">
                			<label>Evaluation Form</label>
                			<select class="form-control select2"  name="form_id">
                				<option disabled="disabled" selected="selected"></option>
                				<?php if(isset($forms) && count($forms)>0){
                					foreach($forms as $emp){
                						
                						
                						?>
                				<option  value="<?php echo isset($emp->id)?$emp->id:0;?>"><?php echo isset($emp->title)?$emp->title:'';?></option>
                				<?php }}?>
                				

                			</select>
                		</div>
                	</div>
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