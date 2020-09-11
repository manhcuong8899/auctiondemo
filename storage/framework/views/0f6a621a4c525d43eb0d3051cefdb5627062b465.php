<?php $__env->startSection('page_title'); ?>
 Thanh toán
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div id="ch4_mainNav" class="clearfix">
        <div id="ch4_continueShopping"><a href="product.html">Chọn thêm sản phẩm</a></div>
        <div id="ch4_helpContainerTopNav">
            <div class="ch4_helpFacebook"><a href="<?php echo e(($settings['linkfanpage'])); ?>"><i class="fa fa-facebook"></i> Facebook</a></div>
            <div class="ch4_helpContactTop"><?php echo e(($settings['hotline'])); ?></div>

        </div>
    </div>
    <div class="container">
        <div class="product-detail">
            <div class="pageTitle">Đấu giá Thành Công</div>
        </div><!-- /.page-view -->
    </div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.checkout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>