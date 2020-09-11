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
            <div class="pageTitle">Thanh toán </div>
            <div class="row">
                <div class="col-sm-8">
                    <?php if(Auth::guest()): ?>
                        <?php echo $__env->make('themes.includes.formcheckout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                        <?php echo $__env->make('themes.includes.membercheckout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                </div><!--/.col-8-->

                <div class="col-sm-4">
                    <!-- Update 24/4 -->
                    <div class="summarySection">
                        <div class="summarySectionTitle">Thông Tin Chung</div>
                        <div class="summaryContent">
                            <div class="summaryCol clearfix">
                                <div class="left">GIÁ ĐẶT (TỔNG SP)</div>
                                <div class="right"><span class="sum_price"><?php echo e(number_format($total,'8',',','.')); ?></span></div>
                            </div>
                            <div class="summaryCol clearfix">
                                <div class="left">CHIẾT KHẤU</div>
                                <div class="right"><span class="sum_sale"><?php echo e(number_format($coupons,'8',',','.')); ?></span></div>
                            </div>
                            <div class="summaryCol clearfix">
                                <div class="left">PHÍ VẬN CHUYỂN</div>
                                <div class="right"><span class="sum_ship">LIÊN HỆ</span></div>
                            </div>

                            <div class="summaryCol clearfix summaryTotal">
                                <div class="left">TỔNG GIÁ ĐẶT</div>
                                <div class="right"><span class="sum_total"><?php echo e(number_format($total-$coupons,'8',',','.')); ?></span></div>
                            </div>

                        </div>
                    </div>

                    <div class="summarySection">
                        <div class="summarySectionTitle">DANH SÁCH ĐẤU GIÁ </div>
                        <div class="summaryContent">
                            <div class="summaryList">
                                <?php foreach( $cart as $index=>$carts ): ?>
                                <div class="cartItem">
                                    <div class="summaryItemImg"><img src="<?php echo e(asset('public/images/products/'.$carts->options->model.'/'.$carts->options->images)); ?>" class="imgresponsive"></div>
                                    <div class="summaryItemContent">
                                        <h4 class="summaryItemTitle"><?php echo e($carts->name); ?></h4>
                                        <p class="ch4_cartItemOptions">
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Số lượng</span>:<?php echo e($carts->qty); ?></span>
                                            <span class="ch4_cartItemOption"><span class="ch4_cartItemLabel">Chiết khấu:</span><?php echo e(number_format($carts->options->coupons,'0',',','.')); ?></span>
                                        </p>
                                        <p class="orange"><?php echo e(number_format(($carts->price*$carts->qty) - $carts->options->coupons,'8',',','.')); ?> ETH</p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- end Update 24/4 -->


                </div><!--/.col-4-->
            </div><!-- /.row-->

        </div><!-- /.page-view -->
    </div><!-- /.container -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.checkout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>