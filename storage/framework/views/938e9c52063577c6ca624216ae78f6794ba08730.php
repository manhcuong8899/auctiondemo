<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>QUẢN LÝ GIAO DỊCH</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo e(asset('/bootstrap/css/bootstrap.css')); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/font-awesome.min.css')); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/ionicons.min.css')); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/AdminLTE.css')); ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/skins/_all-skins.min.css')); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/iCheck/all.css')); ?>">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/morris/morris.css')); ?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/datepicker/datepicker3.css')); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
	<!-- FontAwesome Icon picker -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/fontawesome-iconpicker.min.css')); ?>">
	<!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.css')); ?>">
	<!-- Custom css -->
	<link rel="stylesheet" href="<?php echo e(asset('/dist/css/custom.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/fileinput/css/fileinput.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/select2/select2.min.css')); ?>">

	<!-- Styles -->
	<?php /* <link href="<?php echo e(elixir('/css/app.css')); ?>" rel="stylesheet"> */ ?>

	<!-- Fonts -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> -->

	<!-- Styles -->
	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo e(asset('/dist/js/jquery-2.1.4.min.js')); ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->
	<script src="<?php echo e(asset('/dist/js/bootstrap.min.js')); ?>"></script>

	<!-- DataTables -->
	<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

	<?php /* <script src="<?php echo e(elixir('/js/app.js')); ?>"></script> */ ?>

	<!-- JavaScripts -->
	<!-- Morris.js charts -->
	<script src="<?php echo e(asset('/dist/js/raphael-min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/morris/morris.min.js')); ?>"></script>
	<!-- Sparkline -->
	<script src="<?php echo e(asset('/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
	<!-- jvectormap -->
	<script src="<?php echo e(asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo e(asset('/plugins/knob/jquery.knob.js')); ?>"></script>
	<!-- daterangepicker -->
	<script src="<?php echo e(asset('/dist/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
	<!-- datepicker -->
	<script src="<?php echo e(asset('/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
	<!-- Slimscroll -->
	<script src="<?php echo e(asset('/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo e(asset('/plugins/fastclick/fastclick.min.js')); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo e(asset('/dist/js/app.min.js')); ?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo e(asset('/dist/js/demo.js')); ?>"></script>
	<!-- FontAwesome Icon Picker for demo purposes -->
	<script src="<?php echo e(asset('/dist/js/fontawesome-iconpicker.js')); ?>"></script>
	<!-- iCheck -->
	<script src="<?php echo e(asset('/plugins/iCheck/icheck.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/select2/select2.full.min.js')); ?>"></script>

</head>

<body class="hold-transition skin-blue-light sidebar-mini">
	<div class="wrapper">
		<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('includes.mainsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php echo $__env->make('includes.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<br>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Tìm kiếm <?php echo e($type->name); ?></h3>
					</div>
					<form role="form" action="<?php echo e(url('admin/seach/order')); ?>" method="POST" enctype="multipart/form-data" id="SeachOrderForm">
						<?php echo csrf_field(); ?>

						<div class="box-body">
							<div class="class col-sm-6 col-xs-12">
								<div class="class col-sm-12 col-xs-12">
									<div class="form-group">
										<select class="form-control select2" style="width: 100%;" name="status" id="status">
											<?php if(isset($nowstatus)): ?>
												<option value="<?php echo e($nowstatus->id); ?>"><?php echo e($nowstatus->name); ?></option>
											<?php endif; ?>
											<?php foreach($status as $value): ?>
												<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
											<?php endforeach; ?>
										</select>
									</div>  </div>
								<div class="class col-sm-6 col-xs-6">
									<div class="form-group">
										<label>Từ ngày</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="fromdate" name="fromdate">
										</div>
										<!-- /.input group -->
									</div></div>
								<div class="class col-sm-6 col-xs-6">
									<div class="form-group">
										<label>Đến ngày</label>

										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="todate" name="todate">
										</div>
										<!-- /.input group -->
									</div>
								</div>

							</div>

							<div class="class col-sm-6 col-xs-12">
								<div class="class col-sm-6 col-xs-6">
									<div class="form-group">
										<a class="btn btn-block btn-success btn-sm" id="seach_order">
											<span class="glyphicon glyphicon-search"></span> Tìm kiếm</a>
									</div>
								</div>
							</div>

							<div class="class col-sm-6 col-xs-12">
								<div class="class col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Địa chỉ ví</label>
										<input type="hidden" class="form-control" name="type" id="type" value="<?php echo e($type->id); ?>">
										<input type="text" class="form-control" name="code" id="code" placeholder="Nhập địa chỉ ví">
									</div>
								</div>

							</div>

						</div>
					</form>
				</div>
			</div>
			<?php echo $__env->yieldContent('content'); ?>
		</div><!-- /.content-wrapper -->
		<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div><!-- ./wrapper -->

	<!---- Modal chuyển trạng thái đơn hàng---->
	<div class="modal fade" tabindex="-1" role="dialog" id="StatusDialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">Chuyển trạng thái <?php echo e($type->name); ?></h4>
				</div>
				<?php echo Form::open(['method' => 'POST', 'id'=>'FormStatusOrder']); ?>

				<?php echo csrf_field(); ?>

				<div class="modal-body">
					<div class="box-body">
						<div class="col-md-12">
							<div class="form-group">
								<select class="form-control" name="status">
									<?php foreach($status as $value): ?>
										<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Hủy bỏ</button>
					<button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> Đồng ý</button>
				</div>
				<?php echo Form::close(); ?>

			</div>

		</div>
	</div>
	<!-- Custom scripts -->
	<script src="<?php echo e(asset('/dist/js/custom.js')); ?>">
	</script>
	<script>
		//Date picker
		$('#todate').datepicker({
			autoclose: true,
			format:'yyyy-mm-dd',
			language: 'vn'
		});
		$('#fromdate').datepicker({
			autoclose: true,
			format:'yyyy-mm-dd',
			language: 'vn'
		});
	</script>
	<script>
		$(".select2").select2();
	</script>
	<?php echo $__env->yieldContent('footerscripts'); ?>
</body>
</html>
