<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Oswald&amp;subset=vietnamese" rel="stylesheet">
    <?php echo $__env->make('themes.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        <?php echo $__env->make('themes.includes.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('themes.includes.trending', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
    <div class="pmain">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                <?php echo $__env->make('themes.includes.left_member', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php echo $__env->yieldContent('main-content'); ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- ==========  MAIN : END ============= -->

        <?php echo $__env->make('themes.includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ==========  FOOTER =================-->

    <div id="footer">
        <?php echo $__env->make('themes.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- ==========  FOOTER : END =========== -->
        <?php echo $__env->make('themes.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <p id="back-top" style="display: block;"> <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> </p>
</div>
    <?php echo $__env->yieldContent('page-script'); ?>
<!-- ===============  PAGE : END =============== -->
</body>
</html>