<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">

	<title>AUCTION-BK SÀN ĐẤU GIÁ ĐỒ CỔ TRỰC TUYẾN</title>

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
	<!-- Bootstrap datetime Picker -->
	<link rel="stylesheet" href="<?php echo e(asset('/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>">
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
	<!-- datetimepicker -->
	<script src="<?php echo e(asset('/plugins/datetimepicker/js/bootstrap-datetimepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.uk.js')); ?>"></script>

	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
	<!-- Slimscroll -->
	<script src="<?php echo e(asset('/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo e(asset('/plugins/fastclick/fastclick.min.js')); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo e(asset('/dist/js/app.min.js')); ?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo e(asset('/dist/js/pages/dashboard.js')); ?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo e(asset('/dist/js/demo.js')); ?>"></script>
	<!-- FontAwesome Icon Picker for demo purposes -->
	<script src="<?php echo e(asset('/dist/js/fontawesome-iconpicker.js')); ?>"></script>
	<!-- iCheck -->
	<script src="<?php echo e(asset('/plugins/iCheck/icheck.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/plugins/select2/select2.full.min.js')); ?>"></script>

	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>

	<!-- ckediter và ckfinder -->
	<script type="text/javascript" src="<?php echo e(asset('plugins/editor/ckeditor/ckeditor.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('plugins/editor/ckfinder/ckfinder.js')); ?>"></script>
	<script type="text/javascript">
        var baseURL ="<?php echo url('/'); ?>";
	</script>
	<script type="text/javascript" src="<?php echo e(asset('plugins/editor/func_ckfinder.js')); ?>"></script>
	<!-- end ckediter và ckfinder -->
	<script src="<?php echo e(asset('node_modules/web3/dist/web3.js')); ?>"></script>
	<script src="<?php echo e(asset('themes/assets/js/connect_metamask.js')); ?>"></script>
	<script src="<?php echo e(asset('themes/assets/js/dapp.js')); ?>"></script>
	<script src="<?php echo e(asset('themes/assets/js/eth.js')); ?>"></script>

</head>

<body class="skin-blue-light sidebar-mini sidebar-collapse">
<div class="wrapper">
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.mainsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?php echo $__env->make('includes.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent('content'); ?>
	</div><!-- /.content-wrapper -->
	<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('includes.settingssidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div><!-- ./wrapper -->

<!-- Custom scripts -->
<script src="<?php echo e(asset('/dist/js/custom.js')); ?>"></script>
<script>
    $("#report_order").click(function () {
        $("#ReportOrderForm").submit();
    });
    $('#fromdate').datetimepicker({
        format: "yyyy-mm-dd hh:ii:00"
    });
    $('#todate').datetimepicker({
        format: "yyyy-mm-dd hh:ii:00"
    });
    $('#starttime').datetimepicker({
        format: "yyyy-mm-dd hh:ii:00"
    });
    $('#endtime').datetimepicker({
        format: "yyyy-mm-dd hh:ii:00"
    });
</script>
<?php echo $__env->yieldContent('footerscripts'); ?>
</body>
</html>
