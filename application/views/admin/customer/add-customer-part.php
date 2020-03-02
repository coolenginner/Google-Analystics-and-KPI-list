<form action="" method="post" enctype="multipart/form-data" id="form-category" class="">
            <fieldset class="content-group">
                <legend class="text-bold"></legend>
                <div class="row">
                    <!-- <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">First Name</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" maxlength="255" name="first_name"   value="<?php echo $this->input->post('first_name') ?$this->input->post('first_name') : ''; ?>" >
                        </div>
                    </div> -->
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Name</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="text" maxlength="255" name="name"   value="<?php echo $this->input->post('name') ?$this->input->post('name') : ''; ?>">
                        </div>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Email</label>
                            <span class="text-danger">*</span>
                            <input required class="form-control" type="email" maxlength="255" name="email"   value="<?php echo $this->input->post('email') ?$this->input->post('email') : ''; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Facebook Id</label>
                            <input  class="form-control" type="text" maxlength="255" name="fb_id"   value="<?php echo $this->input->post('fb_id') ?$this->input->post('fb_id') : ''; ?>" >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="">Address</label>
                            <textarea required="required" class="form-control" name="address"><?php echo $this->input->post('address') ?$this->input->post('address') : ''; ?></textarea>
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">City</label>
                            <select  required="required" class="form-control select2" name="city_id">
								<?php 
								$qry="SELECT id,name FROM cs_cities order by name asc";
								$qry=$this->db->query($qry);
								$results = $qry->result();
								if(count($results)>0){
									foreach($results as $row){
										$selected='';
										if($row->id==230){
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
                            <input required="required" class="form-control" type="text" maxlength="255" name="mobile"   value="<?php echo $this->input->post('mobile') ?$this->input->post('mobile') : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="">Phone</label>
                            <input  class="form-control" type="text" maxlength="255" name="phone"   value="<?php echo $this->input->post('phone') ?$this->input->post('phone') : ''; ?>">
                        </div>
                    </div>
                    
                    <!-- <div class="clearfix"></div> -->
                    
                     
                 
              

                </div>
                
            </fieldset>

            <div class="clearfix"></div>
            <!-- <div class="form-group">
                <label>Status</label>
                <div class="clearfix"></div>
                <input id="switch-state" value="1" name="is_active" type="checkbox" data-size="mini" <?php echo (isset($customer_info->status) && $customer_info->status == 1) ? 'checked' : ''; ?> >
            </div> -->

            <div class="">
                <?php if (isset($button_update) && $button_update != '') { ?>
                    <button type="submit" id="submit" class="btn btn-primary"><?php echo $button_update; ?></button>
                <?php } ?>
            </div>
        </form>