<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
             <div class="category-content">
                 <div class="media">
                     <a href="#" class="media-left"><img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle img-sm" alt=""></a>
                     <div class="media-body">
                         <span class="media-heading text-semibold"><?php echo isset($this->Evaluator['first_name'])?$this->Evaluator['first_name']:'';?></span>
                         <div class="text-size-mini text-muted">
                             <?php echo isset($this->Evaluator['job_title'])?$this->Evaluator['job_title']:'';?>
                         </div>
                     </div>

                     
                 </div>
             </div>
         </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    <li class="navigation-header"><span> </span> <i class="icon-menu" title="Main pages"></i></li>
                    
                    <li class=""><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="<?php echo site_url('dashboard/candidates'); ?>"><i class="fa fa-users"></i> <span>Appraisee</span></a></li>
                    
              
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>