<?php $__env->startSection('page_title'); ?>
    Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-7">
                    <div class="product-img clearfix">
                        <div class="easyzoom easyzoom--adjacent easyzoom--with-thumbnails">
                            <a href="<?php echo e(asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)); ?>">
                                <img src="<?php echo e(asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)); ?>" alt="" class="imgresponsive"/>
                            </a>
                        </div>
                    </div>
                    <ul id="thumblist" class="thumbnails clearfix" >
                        <?php foreach($files_images as $key=>$url): ?>
                        <li <?php if($key==0): ?>class="active" <?php endif; ?>>
                            <a href='<?php echo e(asset('public/images/'.$url)); ?>' data-standard="<?php echo e(asset('public/images/'.$url)); ?>" >
                                <img src='<?php echo e(asset('public/images/'.$url)); ?>'>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
                $checktime = \App\Http\Controllers\Controller::checkendtime($detailproduct->starttime,$detailproduct->endtime);
                               ?>
                <div class="col-sm-5">
                    <h1 class="product-title"><?php echo e($detailproduct->name); ?></h1>
                                       <?php if($detailproduct->cates->parent!=null): ?>
                    <h2 class="product-subtitle"><?php echo e($detailproduct->cates->parent->name); ?>-<?php echo e($detailproduct->cates->name); ?></h2>
                    <?php else: ?>
                        <h2 class="product-subtitle"><?php echo e($detailproduct->cates->name); ?></h2>
                    <?php endif; ?>
                    <?php if($checktime==1): ?>
                        <div class="price">Giá sàn: <span class="old"><?php echo e(number_format($detailproduct->price,8,',','.')); ?> ETH</span></div>
                    <div class="product-button">
                        <input class="p-btn btn-qty" required type="number" step="0.01" min="<?php echo e($detailproduct->price); ?>" name="quantity" id="quantity" value="<?php echo e($detailproduct->price); ?>">
                        <button class="p-btn add-to-cart" id="add_cart" value="<?php echo e($detailproduct->id); ?>">ĐẤU GIÁ</button>
                    </div>
                    <?php endif; ?>
                    <div class="product-links">
                        <?php if($checktime==1): ?>

                            <button class="p-btn startus-openbind"><b>ĐANG MỞ ĐẤU GIÁ</b></button>
                        <?php endif; ?>
                            <?php if($checktime==2): ?>

                            <button class="p-btn startus-endbind"><b>KẾT THÚC ĐẤU GIÁ</b></button>
                            <?php endif; ?>
                            <?php if($checktime==0): ?>
                            <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                            <?php endif; ?>

                        <a href="<?php echo $settings['linkfanpage']; ?>" class="facebook" TARGET="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $settings['instagram']; ?>" TARGET="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="product-shipping"> <?php echo $detailproduct->short; ?></div>
                </div><!--/.col-->
            </div><!-- /.row-->
            <div class="product-info-more">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?php echo e(asset('public/images/products/'.$detailproduct->model.'/'.$detailproduct->images)); ?>" alt="" class="imgresponsive"/>
                    </div>
                    <div class="col-sm-8">
                        <h3 class="product-title"><?php echo e($detailproduct->name); ?></h3>
                        <div class="pi-pdpmainbody">
                            <?php echo $detailproduct->long; ?>

                        </div>
                    </div><!--/.col-->
                </div><!--/row-->
            </div><!--/.product-info-more-->
        </div><!-- /.page-view -->
    </div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.productsdetail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>