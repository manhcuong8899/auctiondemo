<?php if(session()->has('status')): ?>
<div class="content-header">
	<div class="alert alert-<?php echo e(session('status-type')); ?> <?php echo e(session('status-dismissable') ? 'alert-dismissible alert-fade' : ''); ?>">
		<?php if(session('status-dismissable')): ?>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php endif; ?>
			<div class="alert alert-success">
				<?php echo e(session()->get('status')); ?>

			</div>
	</div>
</div>
<?php endif; ?>
<?php if(Session::has('flash_message')): ?>
	<div class="alert alert-danger">
		<?php echo e(Session::get('flash_message')); ?>

	</div>
<?php endif; ?>

<div class="modal fade" id="confirmDialog" tabindex="-1" role="dialog" aria-labelledby="confirmDialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger btn-ok">Ok</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>