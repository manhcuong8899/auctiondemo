<?php $__env->startSection('page_title'); ?>
Trang chủ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
        <?php foreach($group as $gp): ?>
    <div class="cols-list-auto list-01">
            <div class="name-box">
                <h2><a href="<?php echo e(url('nhom-san-pham/'.$gp->slug)); ?>"> <b> <?php echo e($gp->name); ?></b></a> </h2>
            </div>
                   <div class="cols-list-content">
                <div class="owl-carousel">
                    <?php foreach(viewProduct($gp->id) as $list): ?>
                        <div class="item">
                            <?php
                            $checktime = \App\Http\Controllers\Controller::checkendtime($list->starttime,$list->endtime);
                            ?>
                            <div class="cover"><a href="<?php echo e(url($list->slug)); ?>"><img src="<?php echo e(asset('public/images/products/'.$list->model.'/'.$list->images)); ?>"alt="<?php echo e($list->name); ?>" class="imgresponsive"></a></div>
                            <div class="info-color" align="center">
                                   <?php if($checktime==1 && $list->status==1 ): ?>
                                    <a href="<?php echo e(url($list->slug)); ?>"><button class="p-btn startus-openbind" value="<?php echo e($list->id); ?>">ĐANG MỞ ĐẤU GIÁ</button></a>
                                    <?php elseif($checktime==2 && $list->status==1): ?>
                                    <button class="p-btn startus-endtime"><b>HẾT THỜI GIAN PHIÊN</b></button>
                                    <?php elseif($checktime==2 && $list->status==2): ?>
                                    <a href="<?php echo e(url($list->slug)); ?>"><button class="p-btn startus-endbind"><b>KẾT THÚC PHIÊN</b></button></a>
                                    <?php else: ?>
                                        <button class="p-btn startus-notbind"><b>CHƯA MỞ ĐẤU GIÁ</b></button>
                                    <?php endif; ?>
                            </div><h3><a href="<?php echo e(url($list->slug)); ?>"><b> <?php echo e($list->name); ?></b></a></h3>
                            <h3><a href="<?php echo e(url($list->slug)); ?>">Mã sản phẩm: <?php echo e($list->code); ?></a></h3>
                            <div class="price"><span>Giá sàn: <?php echo e(number_format($list->price,'2',',','.')); ?> ETH</span></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </div><!-- /.block-products -->
    <?php endforeach; ?>
<?php if($countpview >0): ?>
    <div class="cols-list-auto list-01">
        <div class="name-box">
            <h2><a href="#"> <b>SẢN PHẨM ĐÃ XEM</b></a> </h2>
        </div>
        <div class="cols-list-content">
            <div class="owl-carousel">
                <?php foreach($pview as $index=>$alist ): ?>
                    <div class="item">
                        <div class="cover"><a href="<?php echo e(url($alist->options->slug)); ?>"><img src="<?php echo e(asset('public/images/products/'.$alist->options->model.'/'.$alist->options->images)); ?>"alt="<?php echo e($alist->name); ?>" class="imgresponsive"></a></div>
                        <div class="info-color">
                            <div class="number-of-colors">
                                <a href="<?php echo e(url($alist->options->slug)); ?>"><?php echo e($alist->name); ?></a>
                            </div>
                        </div>
                        <h3><a href="<?php echo e(url($alist->options->slug)); ?>">Mã sản phẩm: <?php echo e($alist->options->code); ?></a></h3>
                        <div class="price"><span>Giá sàn: <?php echo e(number_format($alist->price,'2',',','.')); ?> ETH</span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- /.block-products -->
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('themes.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>