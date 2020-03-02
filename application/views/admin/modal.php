<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo isset($title)?$title:'';?></h4>
			</div>
			<div class="modal-body">
				<?php if(isset($is_table) && $is_table==1){
echo isset($tableHtml)?$tableHtml:'';
					?>

				<?php }else{?>
				<div class="row">
					<?php foreach($boxes as $box){?>
    <div class="col-sm-6 ">
        <!-- small box -->
        <div class="panel bg-teal-400">
            <div class="panel-body">
                <div class="heading-elements">
                    <i class="fa fa-<?php echo isset($box['icon'])?$box['icon']:'users';?> fa-3x"></i>
                </div>

                <h3 class="no-margin"><?php echo isset($box['val']) ? $box['val'] : 0 ?></h3>
                <?php echo isset($box['name'])?$box['name']:'';?>
            </div>
        </div>
    </div>
<?php }?>

</div>
<?php }?>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>
<style>
	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
	{
	padding:7px 17px;
	}

</style>