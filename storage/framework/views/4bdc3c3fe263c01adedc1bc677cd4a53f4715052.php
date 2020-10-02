<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('themes/assets/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('themes/assets/vendors/owcarousel/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/assets/vendors/zoom/easyzoom.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('themes/assets/vendors/select/css/select2.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('themes/assets/css/media-style.css')); ?>">
</head>

<body>
<div id="page"  class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>

    <!-- ==========  HEADER ================= -->
    <div id="pheader">
        <div class="header clearfix">
            <?php echo $__env->make('themes.includes.logo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="hright">
                <?php echo $__env->make('themes.includes.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('themes.includes.menu_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div><!-- /.header -->

        <?php echo $__env->make('themes.includes.trending', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
        <div class="pmain">
            <?php echo $__env->yieldContent('main-content'); ?>
    </div>
    <!-- ==========  MAIN : END ============= -->

        <?php echo $__env->make('themes.includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ==========  FOOTER =================-->

    <div id="footer">
        <?php echo $__env->make('themes.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- ==========  FOOTER : END =========== -->
        <p id="back-top" style="display: block;"> <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> </p>

        <?php echo $__env->make('themes.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script src="<?php echo e(asset('themes/assets/vendors/icheck/icheck.js')); ?>"></script>
        <script src="<?php echo e(asset('themes/assets/vendors/zoom/easyzoom.js')); ?>"></script>
        <script src="<?php echo e(asset('themes/assets/vendors/select/js/select2.js')); ?>"></script>
</div>
    <?php echo $__env->yieldContent('page-script'); ?>
<!-- ===============  PAGE : END =============== -->
</body>
</html>