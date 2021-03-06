<script type="text/javascript">
	function showAjaxModal(url)	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-content').html('<div style="text-align:center;"><img src="<?php echo base_url();?>university/images/preloader.gif" width="400" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response) {
				jQuery('#modal_ajax .modal-content').html(response);
			}
		});
	}
</script>
    
<!-- (Ajax Modal)-->
<div id="modal_ajax" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content slimscrollsidebar"></div>
	</div>
</div>
<!-- /.modal -->
    
<script type="text/javascript">
	function confirm_modal(delete_url) {
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
</script>
    
<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			
			<div class="modal-header">
				<h4 class="modal-title" style="text-align:left;"><strong>CONFIRMATION&nbsp;!!!</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			

			<div class="modal-footer" align="center">
				<div class="row">
					<div class="col-sm-7">	
						ARE YOU SURE YOU WANT TO DELETE THIS INFORMATION ?
					</div>
					<div class="col-sm-5">	
						<a href="#" class="btn btn-success btn-rounded btn-sm" id="delete_link"><i class="fa fa-check">&nbsp;</i>Delete</a>
						<button type="button" class="btn btn-info btn-rounded btn-sm" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>