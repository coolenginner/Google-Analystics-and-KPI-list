<?php

 $this->load->view('admin/includes/head',['body'=>'sidebar-xs']);
$customer_id = $this->uri->segment(4)?$this->uri->segment(4):0;
$invoice_id = $this->uri->segment(5)?$this->uri->segment(5):0;
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
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> Payments</h5>
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
                    <div class="col-md-6">
                    	<div class="custom-error-display form-group">
                    		<input type="hidden" required="required" name="customer_id" id="customer_id" value="">
                    	</div>

                        <div class="form-group">
                        	
                            <label class="">Search Customer</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" type="text" id="search_customer" name="search_customer"   value="">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    

                </div>
               <div class="clearfix"></div>
               <div id="customer_details" class="panel bg-grey-light">
               	
               </div>
               <!-- <hr style="margin-bottom:0;"> -->
               <div class="invoice_select"></div>
               <div id="invoice_details">

               </div>
               
              
              

              
            </fieldset>

            <div class="clearfix"></div>
           

            <div class="pull-right">
              		
                    <!-- <button type="button" data-toggle="modal" data-target="#make-payment" id="submit-order2" class="btn btn-primary">Make Payment</button> -->
              
            </div>

            <div class="modal fade" id="make-payment">
            	<div class="modal-dialog" id="add-wallet">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            				<h4 class="modal-title">Make Payment</h4>
            			</div>
            			<div class="modal-body">
								<div class="MSG"></div>
								<div class="form-group" id="credit-balance">
									<label><input type="checkbox" name="credit_balance" value="1"> Use Credit Balance</label>
								</div>
            					<?php $this->load->view('admin/invoices/payment-form');?>
            				
            			</div>

            		</div>
            	</div>
            </div>
        </form>
    </div>

</div>


<div id="extra_modals"></div>



<?php $this->load->view('admin/includes/footer'); ?>
<script>

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>
	$(document).on('click','#submit-order2',function(){
		$('#add-wallet .MSG').html('');
	});
	$(document).on('change','#invoice_id',function(){
		load_invoice_details($(this).val());
	});
	var counter=0;
	function load_merchant_suggest(CTR){
		var class_selector = '.merchant_name_'+CTR;
	
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
				$.getJSON("<?php echo site_url('admin/orders/search_merchant');?>", {
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



			return '<div class="autocomplete-suggestion"  data-id="' + item['id'] + '" data-name="' + item['name'] + '" ><div class="pull-left"><strong>' + item['id'] + '</strong> - ' + item['name'] + ' </div></div>';
		},
		onSelect: function (e, term, item) {
			var selector_name = $(this)['selector'];
			
			
			$(selector_name+99).val(item.getAttribute('data-id'));
			$(selector_name).val(item.getAttribute('data-name'));

			
		}
	});
}
function get_customer_history(id,invoice_id){
	if(typeof id=='undefined'){
		return false;
	}
	if(typeof invoice_id=='undefined'){
		invoice_id=0;
	}

	
	$.ajax({
		url: '<?php echo  site_url('admin/orders/get_customer_history'); ?>',
		type: 'POST',
		dataType: 'json',
		data: {id:id,with_invoices:1,invoice_id:invoice_id},
		complete: function(xhr, textStatus) {
			//called when complete
		},
		success: function(data, textStatus, xhr) {
			if(data.html){
				if(data.invoices){
					$('.invoice_select').html(data.invoices);
					$('.select2').select2();
				}
				$('#customer_details').html(data.html);
				$('#customer_id').val(id);
				$('#customer_id + span').remove();
				$('#invoice_id').val();
				if(data.credit_balance>0){
					$('#credit-balance').show();
				}else{
					$('#credit-balance').hide();
				}
				load_invoice_details(invoice_id);
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
$(document).on('click','#show_ledger',function(){

	var order_id = $(this).attr('data-id');

	load_invoice_ledger(order_id);
});
function load_invoice_ledger(id){
	if(typeof id=='undefined'){
		return false;
	}
	$.ajax({
			url: '<?php echo  site_url('admin/orders/get_invoice_ledger'); ?>',
			type: 'POST',
			dataType: 'json',
			data: {id:id},
			complete: function(xhr, textStatus) {
				//called when complete
			},
			success: function(data, textStatus, xhr) {
				if(data.html){
						$('#extra_modals').html(data.html);
						$('#order_ledger').modal('show');
				}
				
			},
			error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
			}
		});
}
function load_invoice_details(id){
	if(typeof id=='undefined'){
		return false;
	}
	$.ajax({
			url: '<?php echo  site_url('admin/orders/get_invoice_details'); ?>',
			type: 'POST',
			dataType: 'json',
			data: {id:id},
			complete: function(xhr, textStatus) {
				//called when complete
			},
			success: function(data, textStatus, xhr) {
				if(data.html){
						$('#invoice_details').html(data.html);
				}
				
			},
			error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
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
					$(cur_selector).closest('.row-block').find('.sale_price').val(data.sale_price);
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
	$(document).on('change blur',".quantity,.dollar_price,.sale_price",function(){
		update_totals();
	})
		$(document).ready(function() {
			<?php if($customer_id>0){?>
			get_customer_history('<?php echo $customer_id?>','<?php echo $invoice_id;?>');
			<?php }?>
    		$('input').keydown(function(event){
    			if(event.keyCode == 13) {
    				event.preventDefault();
    				return false;
    			}
    		});


    		$('.add_amount').on('click', function () {
    			$('#add-wallet .MSG').html('');
    			$("form#form-order").validate({
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
    						url: '<?php echo  site_url('admin/invoices/make_payment'); ?>',
    						type: 'POST',
    						dataType: 'json',
    						data: $('#form-order').serialize(),
    						complete: function(xhr, textStatus) {
    							//called when complete
    						},
    						success: function(data, textStatus, xhr) {
    							if(data.error==1){
    								$('#add-wallet .MSG').html('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Warning!</strong> '+data.msg+'</div>'); 
    							}else{
    								$('#add-wallet .MSG').html('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <strong>Success!</strong> '+data.msg+'</div>');
    								$('#add-wallet input[type="text"]').val('');
    								setTimeout(function(){
    									$('#make-payment').modal('hide');
    									var O_id =$('#invoice_id').val();
    									var C_id =$('#customer_id').val();
    									get_customer_history(C_id,O_id);
    									
    								},2000);
    								
    							}
    						},
    						error: function(xhr, textStatus, errorThrown) {
    							//called when there is an error
    						}
    					});
    					
    					
    				}
    			});
    		});

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
                    //form.submit();
                    
                    $.ajax({
                    	url: '<?php echo  site_url('admin/invoices/make_payment'); ?>',
                    	type: 'POST',
                    	dataType: 'json',
                    	data: $('#form-order').serialize(),
                    	complete: function(xhr, textStatus) {
                    		//called when complete
                    	},
                    	success: function(data, textStatus, xhr) {
                    		if(data.error){

                    			return false;
                    		}else{
                    			load_invoice_details($('#invoice_id').val());
                    		}
                    	},
                    	error: function(xhr, textStatus, errorThrown) {
                    		//called when there is an error
                    	}
                    });
                }
            });
        });



       
    });

</script>